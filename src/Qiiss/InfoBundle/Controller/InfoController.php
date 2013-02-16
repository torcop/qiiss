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
 			$config['appId'] = $fbdata->getAppId();
  		$config['secret'] = $fbdata->getApiSecret();
			$config['cookie'] = true;
  		$config['fileUpload'] = false;

  		$facebook = new Facebook($config);
	    $session = $facebook->getSession(); 
	    $fbme = null;

	    if ($session)
			{
      	try
			{
        $uid = $facebook->getUser();
        $fbme = $facebook->api('/me');
      }
			catch (FacebookApiException $e)
			{
				d($e);
      }
    }
 
    function d($d)
		{
			echo '<pre>';
      print_r($d);
      echo '</pre>';
    }
	
		$config['baseurl'] = "http://localhost/Qiiss/web/app_dev.php/";
 
    //if user is logged in and session is valid.
    if ($fbme)
		{
        //Retriving pictures
      try
				{
          $movies = $facebook->api('/me/pictures');
        }
      catch(Exception $o)
			{
        d($o);
      }
 
      //Calling users.getinfo
      try
			{
        $param  =   array(
        'method'  => 'users.getinfo',
        'uids'    => $fbme['id'],
        'fields'  => 'name,current_location,profile_url',
        'callback'=> '');
        $userInfo   =   $facebook->api($param);
      }
      catch(Exception $o)
			{
        d($o);
      }
        try{
            //get user id
            $uid    = $facebook->getUser();

            $fql    =   "select name, hometown_location, sex, pic_square from user where uid=" . $uid;
            $param  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $fqlResult   =   $facebook->api($param);
        		}
        catch(Exception $o)
				{
            d($o);
        }
    }
		return $this->render('QiissInfoBundle:Default:info.html.twig');
   }
}
