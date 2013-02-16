<?php

namespace Qiiss\InfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\UserBundle\Entity\User;

class InfoController extends Controller
{
    public function indexAction()
    {
			//$user = $this->container->get('security.context')->getToken()->getUser();

			$fbdata = $this->container->get('facebook');
			$config = array();
 			$config[‘appId’] = $fbdata->getAppId();
  		$config[‘secret’] = $fbdata->getApiSecret();
			$config[‘cookie’] = true;
  		$config[‘fileUpload’] = false;

  		$facebook = new Facebook($config);
			
			return $this->render('QiissInfoBundle:Default:info.html.twig');
    }
}
