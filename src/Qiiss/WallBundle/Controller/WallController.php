<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\WallBundle\Entity\Comment;

class WallController extends Controller
{
	/*
	 * This function allows to a user to post a new comment in the Qiiss Wall.
	 */
	public function	postAction()
	{
		$comment = new Comment();
		$request = $this->get('request');
		
		if ($request->isMethod('POST'))
		{
			$profileid = $this->get('request')->request
												->get('profileid');

			$repository = $this->getDoctrine()
											 ->getRepository('QiissUserBundle:User');

			$user = $repository->findOneById($profileid);
	
			$username = $user->getUsername();
			$comment->setAuthor($username);
			$comment->setDate(new \DateTime());
			$comment_content = $this->get('request')->request->get('wall_content');
			$comment->setComment($comment_content);
			$comment->setUser($user);
		}
			
		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
	  $em->persist($comment);
	  $em->flush();
			
		$query = $em->createQuery('SELECT c FROM QiissWallBundle:Comment c WHERE c.user = :id')
								->setParameter('id', $profileid);
		$comments = $query->getResult();

		return $this->render('QiissUserBundle:Profile:wall_post.html.twig', array('profileid' => $profileid, 'comments' => $comments));
	}
}
