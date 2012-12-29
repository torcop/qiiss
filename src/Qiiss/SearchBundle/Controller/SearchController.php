<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;
use Qiiss\UserBundle\Entity\User;

class SearchController extends Controller
{
		/*
		* This function manage the search engine requests.
		*/
    public function indexAction()
    {
				$search = new Search();
    		$form = $this->createForm(new SearchType, $search);
		    $request = $this->get('request');

		    if($request->getMethod() == 'POST') 
				{
						$form->bind($request);
						if ($form->isValid())
						{

							$postData = $request->request
																	->get('qiiss_searchbundle_searchtype');
							$preference = $postData['preference'];
							$age = $postData['age'];
							$id_interests = $postData['interests'];
							$id_location = $postData['location'];
							

							$em = $this->getDoctrine()->getManager();
							$query = $em->createQuery('SELECT i FROM QiissUserBundle:Interest i WHERE i.id = :id')
													->setParameter('id', $id_interests);
							$interests = $query->getResult();
							var_dump($interests);exit();
							

							/*$query = $em->createQuery("SELECT u FROM QiissUserBundle:User u WHERE u.sex LIKE :preference
																				 AND u.location LIKE :location");
							$query->setParameters(array('preference' => '%' . $preference . '%',
    																			'location' => '%' . $location . '%',));
							$users = $query->getResult();*/						
						}
				}
        return $this->render('QiissSearchBundle:Search:search.html.twig', array('form' => $form->createView()));
    }
}
