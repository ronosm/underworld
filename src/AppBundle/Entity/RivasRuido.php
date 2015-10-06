<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RivasRuido
 * @ORM\entity
 * @ORM\Table(name="rivas_ruido")
 */
class RivasRuido
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $statusRoom1;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $statusRoom2;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $equipmentRoom1;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @ORM\Column(type="string")
     */
    private $equipmentRoom2;

    /**
     * @var float
     * @ORM\Column(type="decimal", scale=2)
     */
    private $wealth;

    /**
     * @ORM\OneToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="president_id", referencedColumnName="id")
     **/
    private $president;

    /**
     * @ORM\OneToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="vicepresident_id", referencedColumnName="id")
     **/
    private $vicepresident;

    /**
     * @ORM\OneToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="vocal_id", referencedColumnName="id")
     **/
    private $vocal;

    /**
     * @ORM\OneToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="treasurer_id", referencedColumnName="id")
     **/
    private $treasurer;

    /**
     * @ORM\OneToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="secretary_id", referencedColumnName="id")
     **/
    private $secretary;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $about;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $sanctionPolicy;

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
     * @return RivasRuido
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
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
     * @return boolean
     */
    public function isStatusRoom1()
    {
        return $this->statusRoom1;
    }

    /**
     * @param boolean $statusRoom1
     */
    public function setStatusRoom1($statusRoom1)
    {
        $this->statusRoom1 = $statusRoom1;
    }

    /**
     * @return boolean
     */
    public function isStatusRoom2()
    {
        return $this->statusRoom2;
    }

    /**
     * @param boolean $statusRoom2
     */
    public function setStatusRoom2($statusRoom2)
    {
        $this->statusRoom2 = $statusRoom2;
    }

    /**
     * @return string
     */
    public function getEquipmentRoom1()
    {
        return $this->equipmentRoom1;
    }

    /**
     * @param string $equipmentRoom1
     */
    public function setEquipmentRoom1($equipmentRoom1)
    {
        $this->equipmentRoom1 = $equipmentRoom1;
    }

    /**
     * @return string
     */
    public function getEquipmentRoom2()
    {
        return $this->equipmentRoom2;
    }

    /**
     * @param string $equipmentRoom2
     */
    public function setEquipmentRoom2($equipmentRoom2)
    {
        $this->equipmentRoom2 = $equipmentRoom2;
    }

    /**
     * @return float
     */
    public function getWealth()
    {
        return $this->wealth;
    }

    /**
     * @param float $wealth
     */
    public function setWealth($wealth)
    {
        $this->wealth = $wealth;
    }

    /**
     * @return mixed
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * @param mixed $president
     */
    public function setPresident($president)
    {
        $this->president = $president;
    }

    /**
     * @return mixed
     */
    public function getVicepresident()
    {
        return $this->vicepresident;
    }

    /**
     * @param mixed $vicepresident
     */
    public function setVicepresident($vicepresident)
    {
        $this->vicepresident = $vicepresident;
    }

    /**
     * @return mixed
     */
    public function getVocal()
    {
        return $this->vocal;
    }

    /**
     * @param mixed $vocal
     */
    public function setVocal($vocal)
    {
        $this->vocal = $vocal;
    }

    /**
     * @return mixed
     */
    public function getTreasurer()
    {
        return $this->treasurer;
    }

    /**
     * @param mixed $treasurer
     */
    public function setTreasurer($treasurer)
    {
        $this->treasurer = $treasurer;
    }

    /**
     * @return mixed
     */
    public function getSecretary()
    {
        return $this->secretary;
    }

    /**
     * @param mixed $secretary
     */
    public function setSecretary($secretary)
    {
        $this->secretary = $secretary;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param string $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * @return string
     */
    public function getSanctionPolicy()
    {
        return $this->sanctionPolicy;
    }

    /**
     * @param string $sanctionPolicy
     */
    public function setSanctionPolicy($sanctionPolicy)
    {
        $this->sanctionPolicy = $sanctionPolicy;
    }
}

