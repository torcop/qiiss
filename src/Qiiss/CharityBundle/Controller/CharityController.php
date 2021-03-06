<?php

namespace Qiiss\CharityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\CharityBundle\Entity\Charity;
use Qiiss\CharityBundle\Form\CharityType;

class CharityController extends Controller
{
		/* This function allow to add a new charity inside our database.
			 Only available forthe admins.*/
    public function newCharityAction()
    {
				$charity = new Charity();

				$form = $this->createForm(new CharityType, $charity);
				$request = $this->get('request');
				
				if ($request->getMethod() == 'POST')
				{
					$form->bind($request);
					if ($form->isValid())
					{
						$em = $this->getDoctrine()->getEntityManager();
						$em->persist($charity);
						$em->flush();
					}
				}

        return $this->render('QiissCharityBundle:Default:charity.html.twig', array('form' => $form->createView()));
    }
}
