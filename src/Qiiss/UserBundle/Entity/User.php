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

		public function __construct()
		{
			parent::__construct();
    }

	/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="dob.empty", groups={"Registration", "Profile"})
     */
    protected $dob;

    /**
     * @ORM\Column(type="integer", length=10)
     *
     */
    protected $numDateNoty = 0;

    /**
     * @ORM\Column(type="integer", length=10)
     *
     */
    protected $numMessageNoty = 0;

    /**
     * @ORM\Column(type="integer", length=10)
     *
     */
    protected $numNotificationNoty = 0;

    /**
    * @var integer
    * @ORM\ManyToMany(targetEntity="Qiiss\WallBundle\Entity\Comment")
    */
    protected $postsLiked;

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

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=255, nullable=true)
     */
    protected $facebookId;

    public function serialize()
    {
        return serialize(array($this->facebookId, parent::serialize()));
    }

    public function unserialize($data)
    {
        list($this->facebookId, $parentData) = unserialize($data);
        parent::unserialize($parentData);
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get the full name of the user (first + last name)
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

   /**
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        if (!$this->username) {
            $this->setUsername($facebookId);
            $this->salt = '';
        }

        return $this;
    }

    /**
     * @param array $fbdata
     */
    public function setFBData($fbdata)
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
            $this->addRole('ROLE_FACEBOOK');
        }
        if (isset($fbdata['first_name'])) {
            $this->setFirstname($fbdata['first_name']);
        }
        if (isset($fbdata['first_name'])) {
            $this->setUsername($fbdata['first_name']);
        }
        if (isset($fbdata['first_name'])) {
            $this->setUsernameCanonical($fbdata['first_name']);
        }
        if (isset($fbdata['last_name'])) {
            $this->setLastname($fbdata['last_name']);
        }
        if (isset($fbdata['email'])) {
            $this->setEmail($fbdata['email']);
        }
        if (isset($fbdata['birthday'])) {
            $this->setdob($fbdata['birthday']);
        }
    }

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
     * Set numDateNoty
     *
     * @param integer $numDateNoty
     * @return User
     */
    public function setNumDateNoty($numDateNoty)
    {
        $this->numDateNoty = $numDateNoty;

        return $this;
    }

    /**
     * Get numDateNoty
     *
     * @return integer
     */
    public function getNumDateNoty()
    {
        return $this->numDateNoty;
    }

    /**
     * Set numMessageNoty
     *
     * @param integer $numMessageNoty
     * @return User
     */
    public function setNumMessageNoty($numMessageNoty)
    {
        $this->numMessageNoty = $numMessageNoty;

        return $this;
    }

    /**
     * Get numMessageNoty
     *
     * @return integer
     */
    public function getNumMessageNoty()
    {
        return $this->numMessageNoty;
    }

    /**
     * Set numNotificationNoty
     *
     * @param integer $numNotificationNoty
     * @return User
     */
    public function setNumNotificationNoty($numNotificationNoty)
    {
        $this->numNotificationNoty = $numNotificationNoty;

        return $this;
    }

    /**
     * Get numNotificationNoty
     *
     * @return integer
     */
    public function getNumNotificationNoty()
    {
        return $this->numNotificationNoty;
    }

    /**
     * Add postsLiked
     *
     * @param \Qiiss\WallBundle\Entity\Comment $postsLiked
     * @return User
     */
    public function addPostsLiked(\Qiiss\WallBundle\Entity\Comment $postsLiked)
    {
        $this->postsLiked[] = $postsLiked;
    
        return $this;
    }

    /**
     * Remove postsLiked
     *
     * @param \Qiiss\WallBundle\Entity\Comment $postsLiked
     */
    public function removePostsLiked(\Qiiss\WallBundle\Entity\Comment $postsLiked)
    {
        $this->postsLiked->removeElement($postsLiked);
    }

    /**
     * Get postsLiked
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostsLiked()
    {
        return $this->postsLiked;
    }
}