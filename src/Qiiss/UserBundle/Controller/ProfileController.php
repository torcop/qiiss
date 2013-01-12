<?php

namespace Qiiss\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Qiiss\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserInterface;

class ProfileController extends BaseController
{
    /**
     * Show the user
     */
    public function showAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
		}
        $httpKernel = $this->container->get('http_kernel');
        $response = $httpKernel->forward('QiissUserBundle:Retrieve:getProfile', array('profileid' => $user->getId()));
        return $response;
    }
}
