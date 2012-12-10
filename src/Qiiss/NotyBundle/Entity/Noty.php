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
     * @ORM\Column(name="sender", type="integer", length=10)
     */
    private $sender;

    /**
     * @var integer
     *
     * @ORM\Column(name="target", type="integer", length=10)
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
     * Set sender
     *
     * @param integer $sender
     * @return Noty
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return integer
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set target
     *
     * @param integer $target
     * @return Noty
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return integer
     */
    public function getTarget()
    {
        return $this->target;
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

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Get notyRead
     *
     * @return boolean
     */
    public function getnotyRead()
    {
        return $this->notyRead;
    }

    public function setnotyRead($notyRead)
    {
        $this->notyRead = $notyRead;

        return $this;
    }
}
