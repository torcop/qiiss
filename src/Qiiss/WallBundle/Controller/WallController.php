<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\WallBundle\Entity\Comment;
use Qiiss\WallBundle\Entity\Photo;


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
		$dql = "SELECT c FROM Qiiss\WallBundle\Entity\Comment c WHERE c.user = " . $user->getId() . " ORDER BY c.date DESC";
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
			$messageArray["wallPosts"][$i]["author"] = $post->getAuthor();
			$messageArray["wallPosts"][$i]["date"] = $post->getDate();
			$messageArray["wallPosts"][$i]["comment"] = $post->getComment();
			$messageArray["wallPosts"][$i]["numQool"] = $post->getNbQiiss();
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
