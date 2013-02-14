<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;
use Qiiss\UserBundle\Entity\User;

class SearchController extends Controller
{
	/*
	* This function manages the search engine requests.
	*/
    public function indexAction()
		{
			return $this->render('QiissSearchBundle:Search:search.html.twig',
														array('navSelection' => 'searchPeople'));
    }

    public function searchAction()
		{
			$request = $this->get('request');

	    if($request->getMethod() == 'POST')
			{
				$postData = $request->request->get('qiiss_searchbundle_searchtype');
				$sex = $request->request->get('sex');
				$age_min = $request->request->get('age_min');
				$age_max = $request->request->get('age_max');
				$interests = json_decode($request->request->get('interests'));
				$location_city = $request->request->get('city');
				$location_country = $request->request->get('country');
		
				$query =  $this->getDoctrine()->getEntityManager()->createQueryBuilder();

				$query
					->select('u')
				 	->from('QiissUserBundle:User', 'u')
				 	->where($query->expr()->like('u.sex', ':sex'))
				 	->andWhere($query->expr()->like('u.location', ':location'))
				 	->andWhere($query->expr()->like('u.interest', ':interest'))
				 	->setParameters(array('sex' => '%' . $sex . '%',
																'location' => '%'. $id_location .'%',
																'interest' => '%'. $id_interest .'%'));

				if (isset($age_min))
				{
					$query->andWhere($query->expr()->where('u.age > :age_min'))
								->setParameters(array('age_min' => $age_min));
				}
				if (isset($age_max))
				{
					$query->andWhere($query->expr()->where('u.age < :age_max'))
								->setParameters(array('age_max' => $age_max));
				}

				$profiles = $query->getQuery()->getResult();
				var_dump($profiles);exit();
				}
   	 }
}
