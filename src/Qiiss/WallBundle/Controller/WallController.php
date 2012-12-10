<?php

namespace Qiiss\WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\WallBundle\Entity\Wall;

class WallController extends Controller
{
		public function postAction()
    {
			//$paginator = $this->get('knp_paginator');
			
			$wall = new Wall();
			
			$wall->setAuthor($author);
			$wall->setDate('\new DateTime()');
			$wall->setComment($comment);
			if ($mediaLink != NULL)
				$wall->SetMediaLink($mediaLink);

			if ($request->isMethod('POST'))
			{
				$form->bind($request);
				if ($form->isValid())
				{
					
					return $this->redirect($this->generateUrl('qiiss_profile'));
        }
    	}
		}
}
