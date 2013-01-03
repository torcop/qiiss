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
		if ($this->container->get('security.context')->getToken()->getUser()->getId() == $userid) {
			$photos['selfPage'] = true;
		}
		else {
			$photos['selfPage'] = false;
		}
		return $this->render('QiissProfileBundle:Profile:viewPhotos.html.twig', $photos);
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