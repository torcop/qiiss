<?php

namespace Qiiss\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Model\UserInterface;

use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends BaseController
{
    public function loginAction()
    {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        // Only allow login via ajax from the main page form
        if ($request->isXmlHttpRequest()) {
            // get the error if any (works with forward and redirect -- see below)
            if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
            } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
                $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
                $session->remove(SecurityContext::AUTHENTICATION_ERROR);
            } else {
                $error = '';
            }

            if ($error) {
                // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
                $error = $error->getMessage();
            }
            // last username entered by the user
            $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

            $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

            return $this->renderLogin(array(
                'last_username' => $lastUsername,
                'error'         => $error,
                'csrf_token' => $csrfToken,
            ));
        } else {
        // If the /login form was accessed as a standard browser request, redirect them to the homepage
            $url = $this->container->get('router')->generate('qiiss_general_homepage');
            return new RedirectResponse($url);
        }
    }
}
