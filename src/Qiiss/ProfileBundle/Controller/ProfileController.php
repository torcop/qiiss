<?php

namespace Qiiss\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\ProfileBundle\Entity\Date;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\ProfileBundle\Form\DateType;;

class ProfileController extends Controller
{
    public function proposeDateAction()
    {
			$date = new Date();
			$form = $this->createForm(new DateType, $date);
			$noty = new Noty();
			$noty->setDate(new \Datetime());
    	$noty->setSender(7);
			$noty->setTarget(3);
			$noty->setType('New date');
			$noty->setContent('Nizar request a new date for you!');
			$noty->setLink('yeah.com.au');

<<<<<<< HEAD
			$request = $this->get('request');
			if( $request->getMethod() == 'POST' )
			{
				$form->bind($request);
				if($form->isValid())
				{
					$em = $this->getDoctrine()->getEntityManager();
          $em->persist($date);
					$em->persist($noty);
          $em->flush();
          return $this->redirect( $this->generateUrl('qiiss_general_homepage') );
=======
		$request = $this->get('request');
		if( $request->getMethod() == 'POST' ) {
        	$form->bind($request);
        	if($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
                $em->persist($date);
                $em->flush();
                return $this->redirect( $this->generateUrl('qiiss_general_homepage') );
            }
>>>>>>> a84561f0ed837f6fa6c9bc578794205f9fc35279
        }
    	}
			return $this->render('QiissProfileBundle:Profile:date.html.twig', array("form" => $form->createView()));
		}
}
