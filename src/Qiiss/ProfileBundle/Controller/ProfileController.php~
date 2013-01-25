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
				$noty->setSender($sender);
				$noty->setTarget($target);
				$noty->setType("date");
				$noty->setContent("You have a new date request!");
        $noty->setLink($this->container->get('router')->getContext()->getBaseUrl() . "/date/" . $date->getId());
        $noty->setNotyRead(false);
        $target->setNumDateNoty($target->getNumDateNoty() + 1);
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

  /**
  * These functions cause an action on a date and may only be executed by the date target
  */
  public function acceptDateAction($dateid) {
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getTarget() && $date->getStatus() != "accepted") { // Only the target is allowed to accept, and the date can only be accepted once
      $em = $this->getDoctrine()->getEntityManager();
      $date->setStatus("accepted");
      $em->flush();
      // Send the user a notification that their date has been accepted
      $senderNoty = $this->getDoctrine()
        ->getRepository('QiissNotyBundle:Noty')
        ->findOneBy(array( // Make sure if this date gets repeated accepted and declined we don't send multiple new notifications
          'type' => 'date',
          'sender' => $date->getTarget(),
          'target'      => $date->getSender(),
          'notyRead'  => false
        ));

      if (!isset($senderNoty)) {
        $noty = new Noty();
        $noty->setDate(new \DateTime());
        $noty->setSender($date->getTarget());
        $noty->setTarget($date->getSender());
        $noty->setType("date");
        $noty->setContent($date->getTarget()->getUsername() . " has accepted your date request.");
        $noty->setLink($this->container->get('router')->getContext()->getBaseUrl() . "/date/" . $date->getId());
        $noty->setNotyRead(false);
        $noty->getTarget()->setNumDateNoty($noty->getTarget()->getNumDateNoty() + 1);
        $em->persist($noty);
        $em->flush();
      }
      $returnArray['result'] = 'success';
      return new Response(json_encode($returnArray));
    }
    $returnArray['result'] = 'failure';
    return new Response(json_encode($returnArray));
  }

  public function declineDateAction($dateid) {
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getTarget() && $date->getStatus() != "declined") { // Only the target is allowed to accept, and the date can only be accepted once
      $em = $this->getDoctrine()->getEntityManager();
      $date->setStatus("declined");
      $em->flush();
      $returnArray['result'] = 'success';
      return new Response(json_encode($returnArray));
    }
    $returnArray['result'] = 'failure';
    return new Response(json_encode($returnArray));
  }

  public function ignoreDateAction($dateid) {
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getTarget() && $date->getStatus() != "ignored") { // Only the target is allowed to accept, and the date can only be accepted once
      $em = $this->getDoctrine()->getEntityManager();
      $date->setStatus("ignored");
      $em->flush();
      $returnArray['result'] = 'success';
      return new Response(json_encode($returnArray));
    }
    $returnArray['result'] = 'failure';
    return new Response(json_encode($returnArray));
  }

  public function viewDateAction($dateid) {
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getSender() || $user == $date->getTarget()) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise, redirect back to the profile
      $message = new Message(); // Create the message form
      // Get the user's display pictures
      $displayPictureSender = $date->getSender()->getDisplayPicture();
      $displayPictureTarget = $date->getTarget()->getDisplayPicture();

      $displayPictureSender = isset($displayPictureSender) ? $displayPictureSender->getMediumPath() : "qiissgeneral/images/placeholder_dp_medium.png";
      $displayPictureTarget = isset($displayPictureTarget) ? $displayPictureTarget->getMediumPath() : "qiissgeneral/images/placeholder_dp_medium.png";

      $form = $this->createForm(new MessageType, $message);
      return $this->render('QiissProfileBundle:Profile:viewDate.html.twig', array(
        "date" => $date,
        "messageTime" => new \DateTime(),
        "messageForm" => $form->createView(),
        "isTarget" => $user == $date->getTarget() ? true : false,
        "displayPictureSender" => $displayPictureSender,
        "displayPictureTarget" => $displayPictureTarget
      ));
    }
    else {
      $url = $this->get('router')->generate('fos_user_profile_show');
      return new RedirectResponse($url);
    }
  }
}
