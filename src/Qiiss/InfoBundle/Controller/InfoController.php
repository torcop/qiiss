<?php

namespace Qiiss\InfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\UserBundle\Entity\User;

class InfoController extends Controller
{
    public function indexAction()
    {
			$user = $this->container->get('security.context')->getToken()->getUser();
			$fbdata = $this->container->get('facebook');

		  $facebook = new Facebook(array('appId'  => $fbdata->getAppId(),
																		 'secret' => $fbdata->getApiSecret(),
																		 'cookie' => true));

			return $this->render('QiissInfoBundle:Default:info.html.twig');
    }
}
