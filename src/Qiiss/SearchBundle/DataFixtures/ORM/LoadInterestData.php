<?php
namespace Qiiss\SearchBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Qiiss\UserBundle\Entity\Interest;

class LoadInterestData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $interest_1 = new Interest();
        $interest_1->setName('Producer');
				$interest_1->setCategory('Music');

				$interest_2 = new Interest();
        $interest_2->setName('Surf');
				$interest_2->setCategory('Sport');

				$interest_3 = new Interest();
        $interest_3->setName('Gambling');
				$interest_3->setCategory('Games');

				$manager->persist($interest_1);
				$manager->persist($interest_2);
				$manager->persist($interest_3);
        $manager->flush();
    }

		public function getOrder()
    {
        return 2; 
    }
}
