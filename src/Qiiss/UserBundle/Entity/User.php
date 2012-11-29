<?php
// src/Qiiss/UserBundle/Entity/User.php

namespace Qiiss\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

		/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please insert your dob.", groups={"Registration", "Profile"})
     */
    protected $dob;

    /**
     * Set dob
     *
     * @param \string $dob
     * @return User
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    
        return $this;
    }

    /**
     * Get dob
     *
     * @return \string
     */
    public function getDob()
    {
        return $this->dob;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
