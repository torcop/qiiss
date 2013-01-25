<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Qiiss\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class RegistrationController extends BaseController
{

    public function registerAction()
    {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        // Only allow login via ajax from the main page form
        if (!$request->isXmlHttpRequest()) {
            $url = $this->container->get('router')->generate('qiiss_general_homepage');
            return new RedirectResponse($url);
        }

        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();

            $authUser = false;
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
            } else {
                $authUser = true;
            }
            $response = new Response(json_encode(Array("result" => "success")));
            if ($authUser) {
                $this->authenticateUser($user, $response);
            }
            return $response;
        }
        // If the request failed, get all error messages
        $errorHelper = $this->container->get('general.helper.error');
        $errors = $errorHelper->getErrorMessages($form);
        $array['result'] = 'failure';
        if (sizeof($errors) > 0) {
            $shift = array_shift($errors);
            $array['error'] = is_array($shift) ? array_shift($shift)[0] : $shift;
        }
        return new Response(json_encode($array));
    }
}
