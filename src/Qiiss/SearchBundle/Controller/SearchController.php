<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    public function indexAction()
    {
        return $this->render('QiissSearchBundle:Search:search.html.twig');
    }
}
