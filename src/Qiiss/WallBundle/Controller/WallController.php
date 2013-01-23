<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\WallBundle\Entity\Comment;
use Qiiss\WallBundle\Entity\Photo;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\UserBundle\Entity\Interest;
use Qiiss\GeneralBundle\Helper\UploadHelper;



class WallController extends Controller {
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

			$repository = $this->getDoctrine()->getRepository('QiissUserBundle:User');
			$photos = $this->getDoctrine()->getRepository('QiissWallBundle:Photo');

			$user = $repository->findOneById($profileid);
			$username = $user->getUsername();
			$comment->setAuthor($username);
			$comment->setDate(new \DateTime());
			$comment_content = $this->get('request')->request->get('wall_content');
			$comment->setComment($comment_content);
			$comment->setUser($user);
			if ($this->get('request')->request->get('photoid') != "") {
				$photoObject = $photos->findOneById($this->get('request')->request->get('photoid'));
				$comment->setPhoto($photoObject);
				$photoObject->setStatus("published");
			}
			$interests = $this->get('request')->request->get('interests');
			if (isset($interests)) {
				$em = $this->getDoctrine()->getEntityManager();
                $interestRepo = $em->getRepository('Qiiss\UserBundle\Entity\Interest');
				$interestsArray = json_decode($interests);
				foreach ($interestsArray as $interest) {
					if ($interest != "") {
						$toAdd = $interestRepo->findOneBy(array('name' => $interest));
	                    if (isset($toAdd)) {
	                        $comment->addInterest($toAdd);
	                    }
	                    else {
	                        $toAdd = new Interest();
	                        $toAdd->setName($interest);
	                        $comment->addInterest($toAdd);
	                        $em->persist($toAdd);
	                    }
                	}
				}
			}

			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->persist($comment);
			$em->flush();
			$query = $em->createQuery('SELECT c FROM QiissWallBundle:Comment c WHERE c.user = :id')
				->setParameter('id', $profileid);
			$comments = $query->getResult();

			$returnArray["result"] = "success";
			$returnArray["postObject"]["postId"] = $comment->getId();
			$returnArray["postObject"]["author"] = $comment->getAuthor();
			$returnArray["postObject"]["date"] = $comment->getDate();
			$returnArray["postObject"]["comment"] = $comment->getComment();
			$returnArray["postObject"]["numQool"] = $comment->getNbQiiss();
			$i = 0;
			foreach ($comment->getInterests() as $interest) {
				$returnArray["postObject"]["interests"][$i] = $interest->getName();
				$i++;
            }
			// Get the user's display picture
			$displayPicture = $user->getDisplayPicture();
	        if (isset($displayPicture)) {
	          $returnArray["postObject"]["profilePicture"] = $displayPicture->getThumbnailPath();
	        }
	        else {
	          $returnArray["postObject"]["profilePicture"] = "qiissgeneral/images/placeholder_dp_thumb.png";
	        }

			// If there is a photo associated with this wall post, attach it
			if ($comment->getPhoto() != NULL) {
				$returnArray["postObject"]["photo"] = $comment->getPhoto()->getLargePath();
			}
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
			// Get the user's display picture
			$displayPicture = $post->getUser()->getDisplayPicture();
	        if (isset($displayPicture)) {
	          $messageArray["wallPosts"][$i]["profilePicture"] = $displayPicture->getThumbnailPath();
	        }
	        else {
	          $messageArray["wallPosts"][$i]["profilePicture"] = "qiissgeneral/images/placeholder_dp_thumb.png";
	        }
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

		    $j = 0;
			foreach ($post->getInterests() as $interest) {
				$messageArray["wallPosts"][$i]["interests"][$j] = $interest->getName();
				$j++;
            }

		    // Check if there are any photos associated with the post
		    if ($post->getPhoto() != NULL) {
				$messageArray["wallPosts"][$i]["photo"] = $post->getPhoto()->getLargePath();
			}
			$messageArray["numResults"]++;
			$i++;
		}
		return new Response(json_encode($messageArray));
	}

	public function getSinglePostAction($postid) {
		$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user

		$repository = $this->getDoctrine()
			->getRepository('QiissWallBundle:Comment');

		$post = $repository->findOneById($postid);

		$returnArray = array();

		if (isset($post)) {
			$returnArray["post"] = $post;
			$returnArray["largePath"] = $post->getPhoto()->getLargePath();
			$returnArray["profileid"] = $user->getId();
			// Check if the user likes the post already
			$em = $this->getDoctrine()->getEntityManager();
			$query = $em->createQuery('SELECT u,c2 from Qiiss\UserBundle\Entity\User u INNER JOIN u.postsLiked c2 WHERE u.id = :userId AND c2.id = :postId')
		    	->setParameters(array('postId' => $post->getId(),'userId' => $user->getId()));
		    $result = $query->getResult();
		    if (sizeof($result) > 0) {
		    	$returnArray["postLiked"] = true;
		    }
		    else {
		    	$returnArray["postLiked"] = false;
		    }

		    return $this->render('QiissUserBundle:Profile:canvas_post.html.twig', $returnArray);
		}
	}

	/*
	 * This function allows to a user to upload a photo inside the Qiiss Wall.
	 */
	public function uploadAction() {
		$uploader = $this->container->get('general.helper.upload');
		$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
		// list of valid extensions, ex. array("jpeg", "xml", "bmp")

		// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
		$path = 'uploads/' . $user->getUsername();
		if (!is_dir($path)) { // If there isn't a directory with the name specified, create it
			mkdir($path);
        }
		$result = $uploader->handleUpload('uploads/' . $user->getUsername());

		if (isset($result['success'])) {
			$path = $path . "/" . $uploader->getUploadName(); // Get the name of the file to upload
			$photo = new Photo();
			$photo->setName($path);
			$photo->setUser($user);
			$photo->setDate(new \DateTime());
			$photo->setThumbnailPath($result['thumbnail']);
			$photo->setMediumPath($result['mediumFile']);
			$photo->setLargePath($result['largeFile']);
			$photo->setStatus("unpublished");
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($photo);
			$em->flush();

			if (isset($result['success'])) {
				$result['photoid'] = $photo->getId();
				$result['photo'] = $photo;
			}
      	}


		// to pass data through iframe you will need to encode all html tags
		header("Content-Type: text/plain");

	    return new Response(htmlspecialchars(json_encode($result), ENT_NOQUOTES));

	}
}
