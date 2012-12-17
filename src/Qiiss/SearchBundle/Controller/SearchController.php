<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;

class SearchController extends Controller
{
    public function indexAction()
    {
				$search = new Search();
    		$form = $this->createForm(new SearchType, $search);
		    $request = $this->get('request');

		    if($request->getMethod() == 'POST') 
				{
						$form->bind($request);
				}

        return $this->render('QiissSearchBundle:Search:search.html.twig', array('form' => $form->createView()));
    }
}
