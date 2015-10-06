<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MemberGroup
 * @ORM\entity
 * @ORM\Table(name="member_group")
 */
class MemberGroup
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity="Member", mappedBy="groups")
     **/
    private $members;

    /**
     * @ORM\OneToMany(targetEntity="MemberGroup", mappedBy="group")
     **/
    private $sanctions;

    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="group")
     **/
    private $payments;

    /**
     * @ORM\OneToOne(targetEntity="Hour")
     * @ORM\JoinColumn(name="hour_1_id", referencedColumnName="id")
     **/
    private $hour1;

    /**
     * @ORM\OneToOne(targetEntity="Hour")
     * @ORM\JoinColumn(name="hour_22_id", referencedColumnName="id")
     **/
    private $hour2;

    /**
     *
     */
    public function __construct() {
        $this->members = new ArrayCollection();
        $this->sanctions = new ArrayCollection();
        $this->payments = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return MemberGroup
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MemberGroup
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
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }

    /**
     * @return mixed
     */
    public function getSanctions()
    {
        return $this->sanctions;
    }

    /**
     * @param mixed $sanctions
     */
    public function setSanctions($sanctions)
    {
        $this->sanctions = $sanctions;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param mixed $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return mixed
     */
    public function getHour1()
    {
        return $this->hour1;
    }

    /**
     * @param mixed $hour1
     */
    public function setHour1($hour1)
    {
        $this->hour1 = $hour1;
    }

    /**
     * @return mixed
     */
    public function getHour2()
    {
        return $this->hour2;
    }

    /**
     * @param mixed $hour2
     */
    public function setHour2($hour2)
    {
        $this->hour2 = $hour2;
    }
}

