<?php

namespace Qiiss\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * @ORM\Entity
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $thumbnailPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $mediumPath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $largePath;

    /**
     * @ORM\ManyToOne(targetEntity="Qiiss\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $status;

    /**
     * @ORM\Column(type="integer", length=10)
     *
     */
    protected $numLikes = 0;

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
     * @return Photo
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
     * Set path
     *
     * @param string $path
     * @return Photo
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set user
     *
     * @param \Qiiss\UserBundle\Entity\User $user
     * @return Photo
     */
    public function setUser(\Qiiss\UserBundle\Entity\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return \Qiiss\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Photo
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set thumbnailPath
     *
     * @param string $thumbnailPath
     * @return Photo
     */
    public function setThumbnailPath($thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;
        return $this;
    }

    /**
     * Get thumbnailPath
     *
     * @return string
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * Set mediumPath
     *
     * @param string $mediumPath
     * @return Photo
     */
    public function setMediumPath($mediumPath)
    {
        $this->mediumPath = $mediumPath;
        return $this;
    }

    /**
     * Get mediumPath
     *
     * @return string
     */
    public function getMediumPath()
    {
        return $this->mediumPath;
    }

    /**
     * Set largePath
     *
     * @param string $largePath
     * @return Photo
     */
    public function setLargePath($largePath)
    {
        $this->largePath = $largePath;
        return $this;
    }

    /**
     * Get largePath
     *
     * @return string
     */
    public function getLargePath()
    {
        return $this->largePath;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Photo
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set numLikes
     *
     * @param integer $numLikes
     * @return Photo
     */
    public function setNumLikes($numLikes)
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * Get numLikes
     *
     * @return integer
     */
    public function getNumLikes()
    {
        return $this->numLikes;
    }
}