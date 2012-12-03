<?php

namespace Qiiss\NotyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotyController extends Controller
{
    public function notySendAction()
    {
				$evm = new EventManager();
        return $this->render('QiissNotyBundle:default:noty.html.twig');
    }
}
