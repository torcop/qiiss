<?php

namespace Qiiss\CharityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Charity
 */
class Charity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $weblink;

    /**
     * @var float
     */
    private $commission;

    /**
     * @var string
     */
    private $logo;


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
     * Set name
     *
     * @param string $name
     * @return Charity
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Charity
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set weblink
     *
     * @param string $weblink
     * @return Charity
     */
    public function setWeblink($weblink)
    {
        $this->weblink = $weblink;
    
        return $this;
    }

    /**
     * Get weblink
     *
     * @return string 
     */
    public function getWeblink()
    {
        return $this->weblink;
    }

    /**
     * Set commission
     *
     * @param float $commission
     * @return Charity
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    
        return $this;
    }

    /**
     * Get commission
     *
     * @return float 
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Charity
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
