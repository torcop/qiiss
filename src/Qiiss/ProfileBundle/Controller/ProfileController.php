<?php

namespace Qiiss\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\ProfileBundle\Entity\Date;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\ProfileBundle\Form\DateType;

class ProfileController extends Controller
{
  public function proposeDateAction($profileId)
	{
    $date = new Date();
    $form = $this->createForm(new DateType, $date);

    $request = $this->get('request');
    if($request->getMethod() == 'POST')
		{
			$form->bind($request);
      if($form->isValid())
			{
				$em = $this->getDoctrine()->getEntityManager();
        $em->persist($date);
        $em->flush();
        return $this->redirect( $this->generateUrl('qiiss_general_homepage') );
      }
   }
			return $this->render('QiissProfileBundle:Profile:date.html.twig', array("profileId" => $profileId, "form" => $form->createView()));
	}
}
