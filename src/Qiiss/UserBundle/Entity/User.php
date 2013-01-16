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
	   * @ORM\OneToOne(targetEntity="Qiiss\SearchBundle\Entity\Location", cascade={"persist"})
	   */
	  private $location;

		/**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="dob.empty", groups={"Registration", "Profile"})
     */
    protected $dob;
			
		/**
     * @ORM\Column(type="string", length=10, nullable=true)
     *
     */
    protected $age;

	/**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $sex;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $preference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $charity;

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
    * @var integer
    * @ORM\ManyToMany(targetEntity="Qiiss\WallBundle\Entity\Photo")
    */
    protected $photosLiked;

    /**
    * @var integer
    * @ORM\ManyToMany(targetEntity="Qiiss\UserBundle\Entity\Interest")
    */
    protected $interests;

    /**
    * @var integer
    * @ORM\OneToOne(targetEntity="Qiiss\WallBundle\Entity\Photo")
    */
    protected $displayPicture;

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

    /*
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

    }

    /**
     * Get sex
     *
     * @return string
     */

    public function getSex() {
        return $this->sex;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return User
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
    public function getLocation() {
        return $this->location;
    }

     /*
     * Add postsLiked
     * @param \Qiiss\WallBundle\Entity\Comment $postsLiked
     * @return User
     */
     public function addPostsLiked(\Qiiss\WallBundle\Entity\Comment $postsLiked) {
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

    /**
     * Add photosLiked
     *
     * @param \Qiiss\WallBundle\Entity\Photo $photosLiked
     * @return User
     */
    public function addPhotosLiked(\Qiiss\WallBundle\Entity\Photo $photosLiked)
    {
        $this->photosLiked[] = $photosLiked;
        return $this;
    }

    /**
     * Remove photosLiked
     *
     * @param \Qiiss\WallBundle\Entity\Photo $photosLiked
     */
    public function removePhotosLiked(\Qiiss\WallBundle\Entity\Photo $photosLiked)
    {
        $this->photosLiked->removeElement($photosLiked);
    }

    /**
     * Get photosLiked
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotosLiked()
    {
        return $this->photosLiked;
    }

    /**
     * Set displayPicture
     *
     * @param \Qiiss\WallBundle\Entity\Photo $displayPicture
     * @return User
     */
    public function setDisplayPicture(\Qiiss\WallBundle\Entity\Photo $displayPicture = null)
    {
        $this->displayPicture = $displayPicture;
        return $this;
    }

    /**
     * Get displayPicture
     *
     * @return \Qiiss\WallBundle\Entity\Photo
     */
    public function getDisplayPicture()
    {
        return $this->displayPicture;
    }

    /**
     * Add interests
     *
     * @param \Qiiss\UserBundle\Entity\Interest $interests
     * @return User
     */
    public function addInterest(\Qiiss\UserBundle\Entity\Interest $interests)
    {
        $this->interests[] = $interests;
        return $this;
    }

    /**
     * Remove interests
     *
     * @param \Qiiss\UserBundle\Entity\Interest $interests
     */
    public function removeInterest(\Qiiss\UserBundle\Entity\Interest $interests)
    {
        $this->interests->removeElement($interests);
    }

    /**
     * Get interests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Set preference
     *
     * @param string $preference
     * @return User
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
     * Set charity
     *
     * @param string $charity
     * @return User
     */
    public function setCharity($charity)
    {
        $this->charity = $charity;
    
        return $this;
    }

    /**
     * Get charity
     *
     * @return string 
     */
    public function getCharity()
    {
        return $this->charity;
    }
}
