<?php

namespace Qiiss\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class GeneralController extends Controller
{
    public function selfAdminAction()
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $changePassword = $this->container->get('fos_user.change_password.form');

        return $this->render('QiissUserBundle:SelfAdmin:selfAdmin_layout.html.twig',
        	array('changePassword' => $changePassword->createView(),
		    		'navSelection' => 'settings'));
    }
}