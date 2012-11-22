<?php

namespace Qiiss\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GeneralController extends Controller
{
    public function indexAction()
    {
        return $this->render('QiissGeneralBundle:Default:splash.html.twig');
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
