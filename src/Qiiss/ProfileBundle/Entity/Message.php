<?php

namespace Qiiss\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Date
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Message {

	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Qiiss\ProfileBundle\Entity\Date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Qiiss\UserBundle\Entity\User")
     */
    private $sender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="message_date", type="datetime", nullable=true)
     */
    private $message_date;

    /**
     * @var string
     *
     * @ORM\Column(name="message_content", type="text", length=500)
     */
    private $message_content;

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
     * Set message_date
     *
     * @param \DateTime $messageDate
     * @return Message
     */
    public function setMessageDate($messageDate)
    {
        $this->message_date = $messageDate;
    
        return $this;
    }

    /**
     * Get message_date
     *
     * @return \DateTime 
     */
    public function getMessageDate()
    {
        return $this->message_date;
    }

    /**
     * Set message_content
     *
     * @param string $messageContent
     * @return Message
     */
    public function setMessageContent($messageContent)
    {
        $this->message_content = $messageContent;
    
        return $this;
    }

    /**
     * Get message_content
     *
     * @return string 
     */
    public function getMessageContent()
    {
        return $this->message_content;
    }

    /**
     * Set date
     *
     * @param \Qiiss\ProfileBundle\Entity\Date $date
     * @return Message
     */
    public function setDate(\Qiiss\ProfileBundle\Entity\Date $date = null)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \Qiiss\ProfileBundle\Entity\Date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set sender
     *
     * @param \Qiiss\UserBundle\Entity\User $sender
     * @return Message
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
}