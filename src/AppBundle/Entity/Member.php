<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Member
 * @ORM\entity
 * @ORM\Table(name="member")
 */
class Member implements UserInterface, \Serializable
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
     * @var string
     * @ORM\Column(type="string")
     */
    private $surname1;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $surname2;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $birth;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $dni;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=124)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $rol;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="MemberGroup", inversedBy="members")
     * @ORM\JoinTable(name="members_groups")
     **/
    private $groups;

    /**
     * @ORM\ManyToMany(targetEntity="Task", inversedBy="members")
     * @ORM\JoinTable(name="member_task")
     **/
    private $tasks;

    /**
     * Member constructor.
     */
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    static public function getRolOptions()
    {
        return [
            'ROL_ADMIN'   => 'Presidente',
            'ROL_VICE'    => 'Vicepresidente',
            'ROLE_TREAS'  => 'Tesorero',
            'ROLE_SECR'   => 'Secretario',
            'ROLE_VOCAL'  => 'Vocal',
            'ROLE_MEMBER' => 'Miembro',
        ];
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
     * @return Member
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
     * @return Member
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
     * @return string
     */
    public function getSurname1()
    {
        return $this->surname1;
    }

    /**
     * @param string $surname1
     */
    public function setSurname1($surname1)
    {
        $this->surname1 = $surname1;
    }

    /**
     * @return string
     */
    public function getSurname2()
    {
        return $this->surname2;
    }

    /**
     * @param string $surname2
     */
    public function setSurname2($surname2)
    {
        $this->surname2 = $surname2;
    }

    /**
     * @return \DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * @param \DateTime $birth
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     *
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $rol
     * @return string
     */
    public function setRol($rol)
    {
        return $this->rol = $rol;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return [$this->rol];
    }

    /**
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return $this->status ? 'Activo' : 'Inactivo';
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
    }
}

