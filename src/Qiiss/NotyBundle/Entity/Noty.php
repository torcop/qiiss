<?php

namespace Qiiss\NotyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noty
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Noty
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Qiiss\UserBundle\Entity\User")
     */
    private $sender;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Qiiss\UserBundle\Entity\User")
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=500)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=500)
     */
    private $link;

    /**
     * @var boolean
     *
     * @ORM\Column(name="notyRead", type="boolean")
     */
    private $notyRead;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Noty
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
     * Set type
     *
     * @param string $type
     * @return Noty
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Noty
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Noty
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set notyRead
     *
     * @param boolean $notyRead
     * @return Noty
     */
    public function setNotyRead($notyRead)
    {
        $this->notyRead = $notyRead;
    
        return $this;
    }

    /**
     * Get notyRead
     *
     * @return boolean 
     */
    public function getNotyRead()
    {
        return $this->notyRead;
    }

    /**
     * Set sender
     *
     * @param \Qiiss\UserBundle\Entity\User $sender
     * @return Noty
     */
    public function setSender(\Qiiss\UserBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;
    
        return $this;
    }

    /**
     * Get sender
     *
     * @return \Qiiss\UserBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set target
     *
     * @param \Qiiss\UserBundle\Entity\User $target
     * @return Noty
     */
    public function setTarget(\Qiiss\UserBundle\Entity\User $target = null)
    {
        $this->target = $target;
    
        return $this;
    }

    /**
     * Get target
     *
     * @return \Qiiss\UserBundle\Entity\User 
     */
    public function getTarget()
    {
        return $this->target;
    }
}