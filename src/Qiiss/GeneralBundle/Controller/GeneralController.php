<?php

namespace Qiiss\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class GeneralController extends Controller
{
    public function indexAction()
    {
    	$container = $this->container;
		if( $container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
		    $url = $this->get('router')->generate('fos_user_profile_show');
		    return new RedirectResponse($url);
		}
		else {
			$token = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');
			$register_token = $this->container->get('security.context')->getToken();
			$register = $this->container->get('fos_user.registration.form');
			return $this->render('QiissGeneralBundle:Default:splash.html.twig', array('token' => $token, 'registration' => $register->createView()));
    	}
    }

		public function getTokenAction()
		{
			return new Response($this->container->get('form.csrf_provider')
															->generateCsrfToken('authenticate'));
		}

		public function	faqAction()
		{
			return $this->render('QiissGeneralBundle:Default:faq.html.twig');
		}

		public function	resetAction()
		{
			return $this->render('QiissGeneralBundle:Default:resetPassword.html.twig');
		}
}
