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
        	return $this->render('QiissGeneralBundle:Default:splash.html.twig', array('token' => $token));
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
}