<?php
namespace Qiiss\SearchBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Qiiss\SearchBundle\Entity\Location;

class LoadLocationData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $location_1 = new Location();
        $location_1->setCity('Sydney');
				$location_1->setArea('Australia');
				$location_1->setZip('2000');
				$location_1->setLatitude(-33.838483);
				$location_1->setLongitude(151.207123);

				$location_2 = new Location();					
				$location_2->setCity('Melbourne');
				$location_2->setArea('Australia');
				$location_2->setZip('2000');
				$location_2->setLatitude(-33.838483);
				$location_2->setLongitude(151.207123);

				$location_3 = new Location();
				$location_3->setCity('Camberra');
				$location_3->setArea('Australia');
				$location_3->setZip('2000');
				$location_3->setLatitude(-33.838483);
				$location_3->setLongitude(151.207123);

				$location_4 = new Location();
				$location_4->setCity('Brisbane');
				$location_4->setArea('Australia');
				$location_4->setZip('2000');
				$location_4->setLatitude(-33.838483);
				$location_4->setLongitude(151.207123);

				$location_5 = new Location();
				$location_5->setCity('Alice Springs');
				$location_5->setArea('Australia');
				$location_5->setZip('2000');
				$location_5->setLatitude(-33.838483);
				$location_5->setLongitude(151.207123);

        $manager->persist($location_1);
				$manager->persist($location_2);
				$manager->persist($location_3);
				$manager->persist($location_4);
				$manager->persist($location_5);
        $manager->flush();
    }

		public function getOrder()
    {
        return 1; 
    }
}
