<?php
namespace Qiiss\ProfileBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Qiiss\ProfileBundle\Entity\Date;
use	Qiiss\NotyBundle\Entity\Noty;

class NotyIndexer
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($entity instanceof Date)
				{
					$noty = new Noty();
			    $noty->setDate(new \Datetime());
    			$noty->setSender(7);
					$noty->setTarget(3);
					$noty->setType('New date');
					$noty->setContent('Nizar ask you as friend!');

			    $em->persist($noty);
    			$em->flush();
        }
    }
}
