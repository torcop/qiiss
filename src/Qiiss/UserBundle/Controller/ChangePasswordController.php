<?php

namespace Qiiss\UserBundle\Controller;

use FOS\UserBundle\Controller\ChangePasswordController as BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class ChangePasswordController extends BaseController
{

    /**
     * Change user password
     */
    public function changePasswordAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */

        // Only allow changePassword via ajax from the settings form
        if (!$request->isXmlHttpRequest()) {
            $url = $this->container->get('router')->generate('fos_user_profile_show');
            return new RedirectResponse($url);
        }

        $form = $this->container->get('fos_user.change_password.form');
        $formHandler = $this->container->get('fos_user.change_password.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            return new Response(json_encode(Array("result" => "success")));
        }
        // If the request failed, get all error messages
        $errorHelper = $this->container->get('general.helper.error');
        $errors = $errorHelper-> getErrorMessages($form);
        $array['result'] = 'failure';
        if (sizeof($errors) > 0) {
            $shift = array_shift($errors);
            $array['error'] = is_array($shift) && !is_string($shift) ? array_shift($shift) : $shift;
        }
        return new Response(json_encode($array));
    }
}