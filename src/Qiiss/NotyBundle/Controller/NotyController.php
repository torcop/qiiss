<?php

namespace Qiiss\NotyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

class NotyController extends Controller {

    public function notySendAction() {
		  $evm = new EventManager();
      return $this->render('QiissNotyBundle:default:noty.html.twig');
    }

    public function getNotificationsAction($notyType, $firstResult) {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$maxResults = 10;
    	$em = $this->getDoctrine()->getEntityManager();
    	$dql = "SELECT n FROM Qiiss\NotyBundle\Entity\Noty n WHERE n.target = " . $user->getId() . " AND n.type = '" . $notyType . "' ORDER BY n.date DESC";
		  $query = $em->createQuery($dql)
		    ->setFirstResult($firstResult)
		    ->setMaxResults($maxResults);

  		$paginator = new Paginator($query, $fetchJoinCollection = false);

  		$c = count($paginator);
  		$notyArray = array(
  			"numResults" => 0,
  			"numNew" => 0
  		);
      $i = 0;
  		foreach ($paginator as $post) {
		    $notyArray["notifications"][$i]["date"] = $post->getDate()->format('Y-m-d H:i:s');
		    $notyArray["notifications"][$i]["sender"] = $post->getSender();
		    $notyArray["notifications"][$i]["target"] = $post->getTarget();
		    $notyArray["notifications"][$i]["link"] = $post->getLink();
		    $notyArray["notifications"][$i]["type"] = $post->getType();
		    $notyArray["notifications"][$i]["content"] = $post->getContent();
		    $notyArray["notifications"][$i]["notyRead"] = $post->getNotyRead();
		    if (!$post->getNotyRead()) {
		    	$notyArray["numNew"]++;
		    	$post->setNotyRead(true);
		    	$em->flush();
		    }
		    // Return the amount of results, and subtract the new notifications returned from the total number of unread the user has
		    $notyArray["numResults"]++;
        $i++;
		  }
      $userObject = $this->getDoctrine()
        ->getRepository('QiissUserBundle:User')
        ->find($user->getId());

      // Even if the user didn't request all their new notifications, just set the total number to 0 anyway
      if ($notyType == "date") {
        $userObject->setNumDateNoty(0);
      }
      else if ($notyType == "message") {
        $userObject->setNumMessageNoty(0);
      }
      else if ($notyType == "notification") {
        $userObject->setNumNotificationNoty(0);
      }
      $em->flush();

		  return new Response(json_encode($notyArray));
    }

    public function getNotificationsNumberAction($notyType) {
    	$user = $this->container->get('security.context')->getToken()->getUser();
		$userObject = $this->getDoctrine()
          ->getRepository('QiissUserBundle:User')
          ->find($user->getId());
      	$notyArray = array();
        if ($notyType == "date") {
			$notyArray["numNew"] = $userObject->getNumDateNoty();
      	}
      	else if ($notyType == "message") {
			$notyArray["numNew"] = $userObject->getNumMessageNoty();
      	}
      	else if ($notyType == "notification") {
      		$notyArray["numNew"] = $userObject->getNumNotificationNoty();
      	}

		return new Response(json_encode($notyArray));
    }
}
