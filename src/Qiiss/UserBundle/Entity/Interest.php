<?php

namespace Qiiss\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interest
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Interest
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
     * @ORM\Column(name="name", type="string", length=200)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=200, nullable=true)
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="numUsers", type="integer")
     */
    private $numUsers = 0;


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
     * @return Interest
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
     * Set category
     *
     * @param string $category
     * @return Interest
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set numUsers
     *
     * @param integer $numUsers
     * @return Interest
     */
    public function setNumUsers($numUsers)
    {
        $this->numUsers = $numUsers;
    
        return $this;
    }

    /**
     * Get numUsers
     *
     * @return integer 
     */
    public function getNumUsers()
    {
        return $this->numUsers;
    }
}