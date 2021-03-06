<?php

namespace Qiiss\InfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Facebook;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use \BaseFacebook;
use \FacebookApiException;

class InfoController extends Controller
{
    public function facebookRetrieveAction()
    {
			$fbdata = $this->container->get('facebook');
			$config = array();
 			$config['appId'] = $fbdata->getAppId();
  		$config['secret'] = $fbdata->getApiSecret();
			$config['cookie'] = true;
  		$config['fileUpload'] = false;
			$config['baseurl'] = "http://localhost/Qiiss/web/app_dev.php/";

  		$facebook = new Facebook($config);
	    $fbme = null;
      $uid = $facebook->getUser();
      $fbme = $facebook->api('/me', 'GET');
 
	    if ($fbme)
			{
        $param  =   array(
        'method'  => 'users.getinfo',
        'uids'    => $fbme['id'],
        'fields'  => 'name,current_location,profile_url, pic_square',
        'callback'=> '');
        $userInfo = $facebook->api($param);
   		}

/* This part of the code retrieve the profile picture in large size and save it inside the avatar folder. */
		$img = file_get_contents('https://graph.facebook.com/'.$uid.'/picture?type=large');
		$file = dirname(__file__).'/avatar/'.$uid.'.jpg';
		file_put_contents($file, $img);
		
		var_dump($userInfo);exit();
		return $this->render('QiissInfoBundle:Default:info.html.twig', array('facebookInfo' => $userInfo));
	}
}
