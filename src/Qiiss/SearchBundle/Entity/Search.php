<?php

namespace Qiiss\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Search
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Search
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="preference", type="string", length=100)
     */
    private $preference;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var array
     *
     * @ORM\Column(name="interests", type="array")
     */
    private $interests;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=100)
     */
    private $location;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set preference
     *
     * @param string $preference
     * @return Search
     */
    public function setPreference($preference)
    {
        $this->preference = $preference;
    
        return $this;
    }

    /**
     * Get preference
     *
     * @return string 
     */
    public function getPreference()
    {
        return $this->preference;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Search
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set interests
     *
     * @param array $interests
     * @return Search
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
    
        return $this;
    }

    /**
     * Get interests
     *
     * @return array 
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Search
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
}
