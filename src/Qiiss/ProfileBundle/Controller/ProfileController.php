<?php

namespace Qiiss\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\ProfileBundle\Entity\Date;
use Qiiss\NotyBundle\Entity\Noty;
use Qiiss\ProfileBundle\Form\DateType;

class ProfileController extends Controller
{
  public function proposeDateAction()
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
				$repositoryNoty = $em->getRepository('NotyBundle:Noty');
        $em->persist($date);

				$noty = new Noty();

				$id = 13;
				$noty->findOneById(array('id' => $id));
				$noty->setDate(new \DateTime());
				$noty->setSender('16');
				$noty->setTarget('13');
				$noty->setType("New date");
				$noty->setContent("test");
				$noty->setLink("http://www.test.com");
				$em->persist($noty);

        $em->flush();
        return $this->redirect( $this->generateUrl('qiiss_general_homepage') );
      }
   	}
			return $this->render('QiissProfileBundle:Profile:date.html.twig', array("form" => $form->createView()));
	}
}
