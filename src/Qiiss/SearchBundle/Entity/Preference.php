<?php

namespace Qiiss\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preference
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Preference
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
     * @ORM\Column(name="preference", type="string")
     */
    private $preference;

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
     * @return Preference
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
}