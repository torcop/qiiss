<?php

namespace Qiiss\CharityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\CharityBundle\Entity\Charity;

class CharityController extends Controller
{
		/* This function allow to add a new charity inside our database.*/
    public function newCharityAction()
    {
				$charity = new Charity();


        return $this->render('QiissCharityBundle:Default:charity.html.twig');
    }
}
