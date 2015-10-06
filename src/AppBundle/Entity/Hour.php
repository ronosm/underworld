<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hour
 * @ORM\entity
 * @ORM\Table(name="hour")
 */
class Hour
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $hourStart;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $hourEnd;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $room;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $equipment;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $created;


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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Hour
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getHourStart()
    {
        return $this->hourStart;
    }

    /**
     * @param int $hourStart
     */
    public function setHourStart($hourStart)
    {
        $this->hourStart = $hourStart;
    }

    /**
     * @return int
     */
    public function getHourEnd()
    {
        return $this->hourEnd;
    }

    /**
     * @param int $hourEnd
     */
    public function setHourEnd($hourEnd)
    {
        $this->hourEnd = $hourEnd;
    }

    /**
     * @return int
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param int $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return string
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param string $equipment
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }
}

