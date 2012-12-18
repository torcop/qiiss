<?php

namespace Qiiss\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="author", type="string", length=100)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=500)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_Qiiss", type="integer", nullable=true)
     */
    private $nb_Qiiss = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="media_link", type="string", length=800, nullable=true)
     */
    private $media_link;

	/**
     * @ORM\ManyToOne(targetEntity="Qiiss\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
     * Set author
     *
     * @param string $author
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
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
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set nb_Qiiss
     *
     * @param integer $nbQiiss
     * @return Comment
     */
    public function setNbQiiss($nbQiiss)
    {
        $this->nb_Qiiss = $nbQiiss;

        return $this;
    }

    /**
     * Get nb_Qiiss
     *
     * @return integer
     */
    public function getNbQiiss()
    {
        return $this->nb_Qiiss;
    }

    /**
     * Set media_link
     *
     * @param string $mediaLink
     * @return Comment
     */
    public function setMediaLink($mediaLink)
    {
        $this->media_link = $mediaLink;

        return $this;
    }

    /**
     * Get media_link
     *
     * @return string
     */
    public function getMediaLink()
    {
        return $this->media_link;
    }

    /**
     * Set user
     *
     * @param \Qiiss\UserBundle\Entity\User $user
     * @return Comment
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
}