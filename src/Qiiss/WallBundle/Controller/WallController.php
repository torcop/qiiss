<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\WallBundle\Entity\Comment;
use Qiiss\WallBundle\Entity\Photo;


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
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
	 		$em->persist($comment);
	 		$em->flush();
			
			$query = $em->createQuery('SELECT c FROM QiissWallBundle:Comment c WHERE c.user = :id')
								->setParameter('id', $profileid);
			$comments = $query->getResult();

			return $this->render('QiissUserBundle:Profile:wall_post.html.twig', array('profileid' => $profileid, 'comments' => $comments));
		}
			return new Response();
	}

	/*
	 * This function allows to a user to upload a photo inside the Qiiss Wall.
	 */
	public function uploadAction()
	{
		$photo = new Photo();

		$form = $this->createFormBuilder($photo)
									->add('name')
        					->add('file')
        					->getForm();

		$path = $this->get('request')->request->get('file');

		$photo->setPath($path);
		if ($this->getRequest()->getMethod() === 'POST')
		{
			$form->bindRequest($this->getRequest());
			if ($form->isValid())
			{
				$em = $this->getDoctrine()->getEntityManager();
				$photo->upload();
				//$form->getData()->move($dir, $form['file']->getClientOriginalName());

				$em->persist($photo);
				$em->flush();
      }
	  }
		return $this->render('QiissWallBundle::upload_photo.html.twig', array('form' => $form->createView()));
	}
}
