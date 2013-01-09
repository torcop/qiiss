<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\WallBundle\Entity\Comment;
use Qiiss\WallBundle\Entity\Photo;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\GeneralBundle\Helper\UploadHelper;



class PhotoController extends Controller {

	public function getPhotosAction($userid) {
		return new Response(json_encode($this->retrievePhotos($userid)));
	}

	public function showPhotosAction($userid) {
		$photos = $this->retrievePhotos($userid);
		$photos['userid'] = $userid;
		$user = $this->container->get('security.context')->getToken()->getUser();
		if ($user->getId() == $userid) {
			$photos['selfPage'] = true;
		}
		else {
			$photos['selfPage'] = false;
		}
		$displayPicture = $user->getDisplayPicture();
		if (isset($displayPicture)) {
			$photos['dpid'] = $displayPicture->getId();
		}
		else {
			$photos['dpid'] = -1;
		}
		return $this->render('QiissProfileBundle:Profile:viewPhotos.html.twig', $photos);
	}

	public function publishPhotoAction($photoid) {
		$photos = $this->getDoctrine()->getRepository('QiissWallBundle:Photo');

		$photoObject = $photos->findOneById($photoid);

		$returnArray["result"] = "failure";

		// Make sure the user has permission to publish this photo (i.e it's theirs)
		if ($photoObject->getUser()->getId() == $this->container->get('security.context')->getToken()->getUser()->getId()) {
			$photoObject->setStatus("published");
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			$returnArray["result"] = "success";
		}

		return new Response(json_encode($returnArray));
	}

	public function deletePhotoAction($photoid) {
		$photos = $this->getDoctrine()->getRepository('QiissWallBundle:Photo');

		$photoObject = $photos->findOneById($photoid);

		$returnArray["result"] = "failure";

		// Make sure the user has permission to delete this photo (i.e it's theirs)
		if ($photoObject->getUser()->getId() == $this->container->get('security.context')->getToken()->getUser()->getId()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($photoObject);
			$em->flush();

			$returnArray["result"] = "success";
		}

		return new Response(json_encode($returnArray));
	}

		/*
	 * This function allows to a user to "Qool" a post, or toggle their previous status.
	 */
	public function	toggleLikePhotoAction($photoid) {
		$request = $this->get('request');
		if ($request->isMethod('POST')) {
			$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user

			$repository = $this->getDoctrine()->getRepository('QiissWallBundle:Photo');

			$photo = $repository->findOneById($photoid);

			// Check if the user already liked this post
			$em = $this->getDoctrine()->getManager();
			$parameters = array(
		        'photoId' => $photoid,
		        'userId' => $user->getId()
		    );
		    // Check if the user has already liked the specified post
		    $query = $em->createQuery('SELECT p FROM QiissWallBundle:Photo p WHERE p.id = :photoId AND p.id IN (SELECT p2.id from QiissUserBundle:User u INNER JOIN u.photosLiked p2 WHERE u.id = :userId)')
		    	->setParameters($parameters);
			$result = $query->getResult();
			if (sizeof($result) > 0) { // If we found that the user already liked the post, delete the relationship (toggle) else, create the relationship
				$returnArray["result"] = "off";
				$user->removePhotosLiked($photo);
				$photo->setNumLikes($photo->getNumLikes() - 1);
				$em->flush();
				return new Response(json_encode($returnArray));
			}
			else {
				$returnArray["result"] = "on";
				$user->addPhotosLiked($photo);
				$photo->setNumLikes($photo->getNumLikes() + 1);
				if ($user->getId() != $photo->getUser()->getId()) { // You're allowed to like your own post, but we wont send you a notification for it
					$senderNoty = $this->getDoctrine()
					  ->getRepository('QiissNotyBundle:Noty')
					  ->findOneBy(array(
					    'type' => "notification",
					    'sender' => $user,
					    'target'      => $photo->getUser(),
					    'notyRead'  => false
					  ));

					if (!isset($senderNoty)) {
						$noty = new Noty();
						$noty->setDate(new \DateTime());
						$noty->setSender($user);
						$noty->setTarget($photo->getUser());
						$noty->setType("notification");
						$noty->setContent($user->getUsername() . " thought your photo was qool.");
						$noty->setLink($this->container->get('router')->getContext()->getBaseUrl() . "/get-single-photo/" . $photo->getId());
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

	public function setDisplayPictureAction($photoid) {
		$photos = $this->getDoctrine()->getRepository('QiissWallBundle:Photo');

		$photoObject = $photos->findOneById($photoid);

		$user = $this->container->get('security.context')->getToken()->getUser();

		$returnArray["result"] = "failure";

		// Make sure the user has permission to publish this photo (i.e it's theirs)
		if ($photoObject->getUser()->getId() == $user->getId()) {
			$user->setDisplayPicture($photoObject);
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			$returnArray["result"] = "success";
		}
		return new Response(json_encode($returnArray));
	}

	public function retrievePhotos($userid) {
		$firstResult = 0;
		$request = $this->get('request');
		$user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user

		if($request->getMethod() == 'POST') {
			$result = $request->request->get('firstResult');
			if (isset($result)) {
				$firstResult = $this->get('request')->request->get('firstResult'); // If the user has already retrieved new wallposts ala infinite scroll, start from their preferred index
			}
		}
		$maxResults = 30;
		$em = $this->getDoctrine()->getEntityManager();
		$dql = "";
		if ($userid == $user->getId()) { // If the user is looking at their own photos, show unpublished ones, too
			$dql = "SELECT p FROM Qiiss\WallBundle\Entity\Photo p WHERE p.user = " . $userid . " ORDER BY p.date DESC";
		}
		else {
			$dql = "SELECT p FROM Qiiss\WallBundle\Entity\Photo p WHERE p.user = " . $userid . " AND p.status = 'published' ORDER BY p.date DESC";
		}
		$query = $em->createQuery($dql)
			->setFirstResult($firstResult)
			->setMaxResults($maxResults);

		$paginator = new Paginator($query, $fetchJoinCollection = false);

		$c = count($paginator);
		$photoArray = array(
			"result" => "success",
			"numResults" => 0
		);
		$i = 0;
		foreach ($paginator as $post) {
			$photoArray["photos"][$i] = $post;
			$photoArray["numResults"]++;
			$i++;
		}
		return $photoArray;
	}
}