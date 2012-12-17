<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;

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
							$interests = $postData['interests'];
							$location = $postData['location'];
						}
				}
        return $this->render('QiissSearchBundle:Search:search.html.twig', array('form' => $form->createView()));
    }
}
