<?php

namespace Qiiss\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Date
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Date
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
     * @ORM\Column(name="event_description", type="text", length=500)
     */
    private $event_description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="datetime")
     */
    private $event_date;

    /**
     * @var string
     *
     * @ORM\Column(name="event_place", type="string", length=200)
     */
    private $event_place;

    /**
     * @var string
     *
     * @ORM\Column(name="event_media", type="string", length=200)
     */
    private $event_media;

    /**
     * @var string
     *
     * @ORM\Column(name="event_link", type="string", length=200)
     */
    private $event_link;

    /**
     * @var string
     *
     * @ORM\Column(name="event_price", type="string")
     */
    private $event_price;


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
     * Set event_title
     *
     * @param string $eventTitle
     * @return Date
     */

    /**
     * Set event_description
     *
     * @param string $eventDescription
     * @return Date
     */
    public function setEventDescription($eventDescription)
    {
        $this->event_description = $eventDescription;
    
        return $this;
    }

    /**
     * Get event_description
     *
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->event_description;
    }

    /**
     * Set event_date
     *
     * @param \DateTime $eventDate
     * @return Date
     */
    public function setEventDate($eventDate)
    {
        $this->event_date = $eventDate;
    
        return $this;
    }

    /**
     * Get event_date
     *
     * @return \DateTime 
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Set event_place
     *
     * @param string $eventPlace
     * @return Date
     */
    public function setEventPlace($eventPlace)
    {
        $this->event_place = $eventPlace;
    
        return $this;
    }

    /**
     * Get event_place
     *
     * @return string 
     */
    public function getEventPlace()
    {
        return $this->event_place;
    }

    /**
     * Set event_media
     *
     * @param string $eventMedia
     * @return Date
     */
    public function setEventMedia($eventMedia)
    {
        $this->event_media = $eventMedia;
    
        return $this;
    }

    /**
     * Get event_media
     *
     * @return string 
     */
    public function getEventMedia()
    {
        return $this->event_media;
    }

    /**
     * Set event_link
     *
     * @param string $eventLink
     * @return Date
     */
    public function setEventLink($eventLink)
    {
        $this->event_link = $eventLink;
    
        return $this;
    }

    /**
     * Get event_link
     *
     * @return string 
     */
    public function getEventLink()
    {
        return $this->event_link;
    }

    /**
     * Set event_price
     *
     * @param string $eventPrice
     * @return Date
     */
    public function setEventPrice($eventPrice)
    {
        $this->event_price = $eventPrice;
    
        return $this;
    }

    /**
     * Get event_price
     *
     * @return string
     */
    public function getEventPrice()
    {
        return $this->event_price;
    }
}