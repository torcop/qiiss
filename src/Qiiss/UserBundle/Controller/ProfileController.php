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
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface)
				{
            throw new AccessDeniedException('This user does not have access to this section.');
    		}

        $url = $this->container->get('router')->generate('qiiss_profile', array("profileid" => $user->getId(), "profilePicture" => $user->getDisplayPicture()->getMediumPath()));
        return new RedirectResponse($url);

        //return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'), array('user' => $user, 'navSelection' => 'profile'));
    }
}
