<?php
namespace Qiiss\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Qiiss\UserBundle\Entity\User;
use Qiiss\WallBundle\Controller\PhotoController;

class RetrieveController extends Controller
{
    public function getProfileAction($profileid)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $username = $this->getDoctrine()
        ->getRepository('QiissUserBundle:User')
        ->find($profileid);

        if (!is_object($username)) {
            return new Response("404 profile not found");
        }

        $photos = new PhotoController();
        $photos->setContainer($this->container);
        $photoArray = array();
        $photoArrayUnsliced = $photos->retrievePhotos($profileid);
        if ($photoArrayUnsliced["numResults"] > 0) {
            //$photoArray = array_slice($photos->retrievePhotos($profileid)["photos"], 0, 6);
        }
        $displayPicture = $username->getDisplayPicture();
        if (isset($displayPicture)) {
            $displayPicture = $displayPicture->getMediumPath();
        }
        else {
            $displayPicture = "qiissgeneral/images/placeholder_dp_medium.png";
        }
        $selfProfile = ($user->getId() == $username->getId());
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'),
            array(
                'user' => $username,
                'location' => $username->getLocation(),
                'username' => $username->getUsername(),
                'profileid' => $username->getId(),
                'profilePicture' => $displayPicture,
                'navSelection' => 'profile',
                'photos' => $photoArray,
                'selfProfile' => $selfProfile)
            );
    }
}
