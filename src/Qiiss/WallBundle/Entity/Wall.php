<?php

namespace Qiiss\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wall
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Wall
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
    private $nb_Qiiss;

    /**
     * @var string
     *
     * @ORM\Column(name="media_link", type="string", length=800, nullable=true)
     */
    private $media_link;


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
     * @return Wall
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
     * @return Wall
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
     * @return Wall
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
     * @return Wall
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
     * @return Wall
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
}
