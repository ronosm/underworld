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
     */
    private $id;

    /**
     * @var integer
     */
    private $hourStart;

    /**
     * @var integer
     */
    private $hourEnd;

    /**
     * @var integer
     */
    private $room;

    /**
     * @var string
     */
    private $equipment;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var \DateTime
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
}

