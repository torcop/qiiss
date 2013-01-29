<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;
use Qiiss\UserBundle\Entity\User;

class SearchController extends Controller {
	/*
	* This function manages the search engine requests.
	*/
    public function indexAction() {
    	$search = new Search();
		$form = $this->createForm(new SearchType, $search);
	    $request = $this->get('request');

	    if($request->getMethod() == 'POST') {
			$form->bind($request);
			if ($form->isValid())
			{

				$postData = $request->request
														->get('qiiss_searchbundle_searchtype');
				$preference = $postData['preference'];
				$age = $postData['age'];
				$id_interest = $postData['interests'];
				$id_location = $postData['location'];

				$query =  $this->getDoctrine()->getEntityManager()->createQueryBuilder();

				$query
					 ->select('u')
					 ->from('QiissUserBundle:User', 'u')
					 ->where($query->expr()->like('u.sex', ':preference'))
					 ->andWhere($query->expr()->like('u.age', ':age'))
					 ->andWhere($query->expr()->like('u.location', ':location'))
					 ->andWhere($query->expr()->like('u.interest', ':interest'))
					 ->setParameters(array(
					 	'preference' => '%'.$preference.'%',
						'age' => '%'. $age .'%',
						'location' => '%'. $id_location .'%',
						'interest' => '%'. $id_interest .'%'
					));

				$profiles = $query->getQuery()->getResult();
			}
		}
        return $this->render('QiissSearchBundle:Search:search.html.twig', array('form' => $form->createView(), 'navSelection' => 'searchPeople'));
    }
}
