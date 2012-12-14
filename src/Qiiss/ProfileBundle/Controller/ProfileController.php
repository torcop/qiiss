<?php

namespace Qiiss\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\ProfileBundle\Entity\Date;
use Qiiss\ProfileBundle\Entity\Message;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\ProfileBundle\Form\DateType;
use Qiiss\ProfileBundle\Form\MessageType;

class ProfileController extends Controller {

  public function proposeDateAction($profileid) {
    // If the user is trying to propose a date with themselves, redirect them back to their profile
    $user = $this->container->get('security.context')->getToken()->getUser();
    if ($profileid == $user->getId()) {
      $url = $this->container->get('router')->generate('qiiss_profile', array("profileid" => $user->getId()));
      return new RedirectResponse($url);
    }

    // Else serve the date form
    $date = new Date();
    $form = $this->createForm(new DateType, $date);

    $request = $this->get('request');

    if($request->getMethod() == 'POST') {
			$form->bind($request);

      if($form->isValid()) {
        $sender = $this->getDoctrine()
          ->getRepository('QiissUserBundle:User')
          ->find($user->getId());
        $target = $this->getDoctrine()
          ->getRepository('QiissUserBundle:User')
          ->find($profileid);
        $date->setSender($sender);
        $date->setTarget($target);
				$em = $this->getDoctrine()->getEntityManager();
        $em->persist($date);
        $em->flush();

				$noty = new Noty();
				$noty->setDate(new \DateTime());
				$noty->setSender($user->getId());
				$noty->setTarget($profileid);
				$noty->setType("date");
				$noty->setContent("You have a new date request!");
        $noty->setLink($this->container->get('router')->getContext()->getBaseUrl() . "/date/" . $date->getId());
        $noty->setNotyRead(false);
        $userObject = $this->getDoctrine()
          ->getRepository('QiissUserBundle:User')
          ->find($profileid);
        $userObject->setNumDateNoty($userObject->getNumDateNoty() + 1);
				$em->persist($noty);
        $em->flush();

        return $this->redirect( $this->generateUrl('qiiss_general_homepage') );
      }
   	}
    $username = $this->getDoctrine()
        ->getRepository('QiissUserBundle:User')
        ->find($profileid);

		return $this->render('QiissProfileBundle:Profile:proposeDate.html.twig', array("form" => $form->createView(),
																				"username" => $username->getUsername(), "profileid" => $profileid));
	}

  public function viewDateAction($dateid) {
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getSender() || $user == $date->getTarget()) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise, redirect back to the profile
      $message = new Message(); // Create the message form
      $form = $this->createForm(new MessageType, $message);
      return $this->render('QiissProfileBundle:Profile:viewDate.html.twig', array(
        "date" => $date,
        "messageTime" => new \DateTime(),
        "messageForm" => $form->createView()
      ));
    }
    else {
      $url = $this->get('router')->generate('fos_user_profile_show');
      return new RedirectResponse($url);
    }
  }
}
