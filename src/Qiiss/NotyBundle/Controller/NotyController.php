<?php

namespace Qiiss\NotyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

class NotyController extends Controller
{
    public function notySendAction()
    {
		$evm = new EventManager();
        return $this->render('QiissNotyBundle:default:noty.html.twig');
    }

    public function getNotificationsAction($notyType, $firstResult) {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$maxResults = 10;
    	$em = $this->getDoctrine()->getEntityManager();
    	$dql = "SELECT n FROM Qiiss\NotyBundle\Entity\Noty n WHERE n.target = " . $user->getId() . " AND n.type = '" . $notyType . "'";
		$query = $em->createQuery($dql)
		                       ->setFirstResult($firstResult)
		                       ->setMaxResults($maxResults);

		$paginator = new Paginator($query, $fetchJoinCollection = true);

		$c = count($paginator);
		$notyArray = array(
			"numResults" => 0,
			"numNew" => 0
		);
		foreach ($paginator as $post) {
		    $notyArray["notifications"][$post->getId()]["date"] = $post->getDate()->format('Y-m-d H:i:s');
		    $notyArray["notifications"][$post->getId()]["sender"] = $post->getSender();
		    $notyArray["notifications"][$post->getId()]["target"] = $post->getTarget();
		    $notyArray["notifications"][$post->getId()]["link"] = $post->getLink();
		    $notyArray["notifications"][$post->getId()]["type"] = $post->getType();
		    $notyArray["notifications"][$post->getId()]["content"] = $post->getContent();
		    $notyArray["notifications"][$post->getId()]["notyRead"] = $post->getNotyRead();
		    if (!$post->getNotyRead()) {
		    	$notyArray["numNew"]++;
		    	$post->setNotyRead(true);
		    	$em->flush();
		    }
		    // Save the id of the last retrieved noty in case we need to get more later
		    $notyArray["numResults"]++;
		}

		return new Response(json_encode($notyArray));
    }
    public function getNotificationsNumberAction($notyType) {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$maxResults = 10;
    	$em = $this->getDoctrine()->getEntityManager();
    	$dql = "SELECT n FROM Qiiss\NotyBundle\Entity\Noty n WHERE n.target = " . $user->getId() . " AND n.type = '" . $notyType . "'";
		$result = $em->createQuery($dql)
			->getResult();
		$notyArray = array(
			"numNew" => 0
		);
		foreach ($result as $post) {
		    if (!$post->getNotyRead()) {
		    	$notyArray["numNew"]++;
		    }
		}

		return new Response(json_encode($notyArray));
    }
}
