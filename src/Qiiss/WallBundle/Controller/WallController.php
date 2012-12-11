<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\WallBundle\Entity\Wall;
use Qiiss\WallBundle\Form\WallType;

class WallController extends Controller
{
	/*
	 * This function allows to a user to post a new comment in the Qiiss Wall.
	 */
	public function	postAction()
	{
		$wall = new Wall();
		$request = $this->get('request');
		
		if ($request->isMethod('POST'))
		{
			$profileid = $this->get('request')->request
												->get('profileid');

			$repository = $this->getDoctrine()
													->getRepository('QiissUserBundle:User');

			$user = $repository->findOneById($profileid);

			$username = $user->getUsername();
			$wall->setAuthor($username);
			$wall->setDate(new \DateTime());
			$wall_content = $this->get('request')->request->get('wall_content');
			$wall->setComment($wall_content);
			
			$em = $this->getDoctrine()->getManager();
	    $em->persist($wall);
	    $em->flush();

			return $this->render('QiissUserBundle:Profile:profile.html.twig');
		}
	}
}
