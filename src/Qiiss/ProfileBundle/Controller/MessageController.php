<?php

namespace Qiiss\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\ProfileBundle\Entity\Date;
use Qiiss\ProfileBundle\Entity\Message;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\ProfileBundle\Form\MessageType;

class MessageController extends Controller {

  public function sendMessageAction($dateid) {
    if ($this->checkAllowed($dateid)) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise return an error
      $returnArray = array();
      $message = new Message();
      $form = $this->createForm(new MessageType, $message);

      $request = $this->get('request');

      if($request->getMethod() == 'POST') {
        $form->bind($request);

        if($form->isValid()) {
          // Set the date of the message being sent to right now
          $message->setMessageDate(new \DateTime());

          // Set the corresponding date object that the message is attached to
          $date = $this->getDoctrine()
          ->getRepository('QiissProfileBundle:Date')
          ->find($dateid);
          $message->setDate($date);

          // Set the "sending" user so we know which one of the date users sent the message
          $user = $this->container->get('security.context')->getToken()->getUser();
          $sender = $this->getDoctrine()
          ->getRepository('QiissUserBundle:User')
          ->find($user->getId());
          $message->setSender($sender);

          // Persist the object
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($message);
          $em->flush();
          /*
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
          */
          $returnArray["result"] = "success";
          return new Response(json_encode($returnArray));
        }
        else {
          $errorHelper = $this->container->get('general.helper.error');
          $errors = $errorHelper->getErrorMessages($form);
          $array['result'] = 'failure';
          if (sizeof($errors) > 0) {
              $shift = array_shift($errors);
              $array['error'] = is_array($shift) ? array_shift($shift)[0] : $shift;
          }
          return new Response(json_encode($array));
        }
      }
    }
  }

  /*
  *
  * This method returns old messages, as if someone was scrolling "up" in an old chat
  *
  */
  public function getOldMessagesAction($dateid, $firstResult = 0) {
    if ($this->checkAllowed($dateid)) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise return an error
      $request = $this->get('request');

      if($request->getMethod() == 'POST') {
        $result = $request->request->get('firstResult');
        if (isset($result)) {
          $firstResult = $this->get('request')->request->get('firstResult');
        }
      }
      $maxResults = 10;
      $em = $this->getDoctrine()->getEntityManager();
      $dql = "SELECT m, d FROM Qiiss\ProfileBundle\Entity\Message m JOIN m.date d WHERE d.id = " . $dateid . " ORDER BY m.message_date DESC";
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
        $messageArray["messages"][$i]["messageSender"] = $post->getSender()->getUsername();
        $messageArray["messages"][$i]["messageDate"] = $post->getMessageDate();
        $messageArray["messages"][$i]["messageContent"] = $post->getMessageContent();
        $messageArray["numResults"]++;
        $i++;
      }
      return new Response(json_encode($messageArray));
    }
    else {
      $returnArray["result"] = "failure";
      return new Response(json_encode($returnArray));
    }
  }

  /*
  * This function returns new messages, after a specified time
  */
  public function getNewMessagesAction($dateid) {
    if ($this->checkAllowed($dateid)) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise return an error
      return new Response("test");
    }
  }

  /*
  * Checks if a user has permission to send a message to this date id
  */
  public function checkAllowed($dateid) {
    $returnArray = array();
    $user = $this->container->get('security.context')->getToken()->getUser(); // Get the current user
    $date = $this->getDoctrine() // Get the corresponding date object
      ->getRepository('QiissProfileBundle:Date')
      ->find($dateid);
    if ($user == $date->getSender() || $user == $date->getTarget()) { // Make sure that only the "sender" and "target" are allowed to view this date, otherwise return an error
      return true;
    }
    else {
      return false;
    }
  }
}
