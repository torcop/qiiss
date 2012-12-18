<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\WallBundle\Entity\Comment;
use Qiiss\WallBundle\Entity\Photo;
use Qiiss\NotyBundle\Entity\Noty;


class WallController extends Controller
{
	/*
	 * This function allows to a user to post a new comment in the Qiiss Wall.
	 */
	public function	postAction() {
		$comment = new Comment();
		$request = $this->get('request');
		if ($request->isMethod('POST'))
		{
			$profileid = $this->get('request')->request
												->get('profileid');

			$repository = $this->getDoctrine()
											 ->getRepository('QiissUserBundle:User');

			$user = $repository->findOneById($profileid);
			$username = $user->getUsername();
			$comment->setAuthor($username);
			$comment->setDate(new \DateTime());
			$comment_content = $this->get('request')->request->get('wall_content');
			$comment->setComment($comment_content);
			$comment->setUser($user);

			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->persist($comment);
			$em->flush();
			$query = $em->createQuery('SELECT c FROM QiissWallBundle:Comment c WHERE c.user = :id')
								->setParameter('id', $profileid);
			$comments = $query->getResult();

			$returnArray["result"] = "success";
			$returnArray["postObject"]["author"] = $comment->getAuthor();
			$returnArray["postObject"]["date"] = $comment->getDate();
			$returnArray["postObject"]["comment"] = $comment->getComment();
			$returnArray["postObject"]["numQool"] = $comment->getNbQiiss();
			return new Response(json_encode($returnArray));
		}
		$returnArray["result"] = "failure";
		return new Response(json_encode($returnArray));
	}

	/*
	 * This function allows to a user to "Qool" a post, or toggle their previous status.
	 */
	public function	toggleLikePostAction($postid) {
		$request = $this->get('request');
		if ($request->isMethod('POST')) {
			$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user

			$repository = $this->getDoctrine()->getRepository('QiissWallBundle:Comment');

			$post = $repository->findOneById($postid);

			// Check if the user already liked this post
			$em = $this->getDoctrine()->getManager();
			$parameters = array(
		        'postId' => $postid,
		        'userId' => $user->getId()
		    );
		    // Check if the user has already liked the specified post
		    $query = $em->createQuery('SELECT c FROM QiissWallBundle:Comment c WHERE c.id = :postId AND c.id IN (SELECT c2.id from QiissUserBundle:User u INNER JOIN u.postsLiked c2 WHERE u.id = :userId)')
		    	->setParameters($parameters);
			$result = $query->getResult();
			if (sizeof($result) > 0) { // If we found that the user already liked the post, delete the relationship (toggle) else, create the relationship
				$returnArray["result"] = "off";
				$user->removePostsLiked($post);
				$post->setNbQiiss($post->getNbQiiss() - 1);
				$em->flush();
				return new Response(json_encode($returnArray));
			}
			else {
				$returnArray["result"] = "on";
				$user->addPostsLiked($post);
				$post->setNbQiiss($post->getNbQiiss() + 1);
				if ($user->getId() != $post->getUser()->getId()) { // You're allowed to like your own post, but we wont send you a notification for it
					$senderNoty = $this->getDoctrine()
					  ->getRepository('QiissNotyBundle:Noty')
					  ->findOneBy(array(
					    'type' => "notification",
					    'sender' => $user,
					    'target'      => $post->getUser(),
					    'notyRead'  => false
					  ));

					if (!isset($senderNoty)) {
						$noty = new Noty();
						$noty->setDate(new \DateTime());
						$noty->setSender($user);
						$noty->setTarget($post->getUser());
						$noty->setType("notification");
						$noty->setContent($user->getUsername() . " thought your post was qool.");
						$noty->setLink($this->container->get('router')->getContext()->getBaseUrl() . "/get-single-wall-post/" . $post->getId());
						$noty->setNotyRead(false);
						$noty->getTarget()->setNumNotificationNoty($noty->getTarget()->getNumNotificationNoty() + 1);
						$em->persist($noty);
					}
				}
				$em->flush();
				return new Response(json_encode($returnArray));
			}
		}
		$returnArray["result"] = "failure";
		return new Response(json_encode($returnArray));
	}

	public function getUserWallPostsAction($userid, $firstResult = 0) {
		$request = $this->get('request');
		$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user

		if($request->getMethod() == 'POST') {
			$result = $request->request->get('firstResult');
			if (isset($result)) {
				$firstResult = $this->get('request')->request->get('firstResult'); // If the user has already retrieved new wallposts ala infinite scroll, start from their preferred index
			}
		}
		$maxResults = 10;
		$em = $this->getDoctrine()->getEntityManager();
		$dql = "SELECT c FROM Qiiss\WallBundle\Entity\Comment c WHERE c.user = " . $userid . " ORDER BY c.date DESC";
		$query = $em->createQuery($dql)
			->setFirstResult($firstResult)
			->setMaxResults($maxResults);

		$paginator = new Paginator($query, $fetchJoinCollection = false);

		$c = count($paginator);
		$messageArray = array(
			"result" => "success",
			"numResults" => 0
		);
		$i = 0;
		foreach ($paginator as $post) {
			$messageArray["wallPosts"][$i]["postId"] = $post->getId();
			$messageArray["wallPosts"][$i]["author"] = $post->getAuthor();
			$messageArray["wallPosts"][$i]["date"] = $post->getDate();
			$messageArray["wallPosts"][$i]["comment"] = $post->getComment();
			$messageArray["wallPosts"][$i]["numQool"] = $post->getNbQiiss();
			// Check if the user liked the post already
			$query = $em->createQuery('SELECT u,c2 from Qiiss\UserBundle\Entity\User u INNER JOIN u.postsLiked c2 WHERE u.id = :userId AND c2.id = :postId')
		    	->setParameters(array('postId' => $post->getId(),'userId' => $user->getId()));
		    $result = $query->getResult();
		    if (sizeof($result) > 0) {
		    	$messageArray["wallPosts"][$i]["postLiked"] = true;
		    }
		    else {
		    	$messageArray["wallPosts"][$i]["postLiked"] = false;
		    }
			$messageArray["numResults"]++;
			$i++;
		}
		return new Response(json_encode($messageArray));
	}

	/*
	 * This function allows to a user to upload a photo inside the Qiiss Wall.
	 */
	public function uploadAction() {
		$photo = new Photo();

		$form = $this->createFormBuilder($photo)
			->add('name')
			->add('file')
			->getForm();

		$path = $this->get('request')->request->get('file');

		$photo->setPath($path);
		if ($this->getRequest()->getMethod() === 'POST')
		{
			$form->bindRequest($this->getRequest());
			if ($form->isValid())
			{
				$em = $this->getDoctrine()->getEntityManager();
				$photo->upload();
				$em->persist($photo);
				$em->flush();
      }
	  }
		return $this->render('QiissWallBundle::upload_photo.html.twig', array('form' => $form->createView()));
	}
}
