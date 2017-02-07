<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Staff
 *
 * @ORM\Table(name="staff")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StaffRepository")
 */
class Staff
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="staffName", type="string", length=255)
     */
    private $staffName;

    /**
     * @var int
     *
     * @ORM\Column(name="empNumber", type="integer", nullable=true)
     */
    private $empNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="fTE", type="integer")
     */
    private $fTE;

    /**
     * @var string
     *
     * @ORM\Column(name="nameCode", type="string", length=255)
     */
    private $nameCode;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\Column(name="departmentCategory", type="integer")
     */
    private $departmentCategory;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\staff4Item", mappedBy="staff")
     *
     */
    protected $assignments;


    public function __construct()
    {
        $this->assignments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStaffName()
    {
        return $this->staffName;
    }

    /**
     * @param string $staffName
     */
    public function setStaffName($staffName)
    {
        $this->staffName = $staffName;
    }

    /**
     * @return int
     */
    public function getEmpNumber()
    {
        return $this->empNumber;
    }

    /**
     * @param int $empNumber
     */
    public function setEmpNumber($empNumber)
    {
        $this->empNumber = $empNumber;
    }

    /**
     * @return int
     */
    public function getFTE()
    {
        return $this->fTE;
    }

    /**
     * @param int $fTE
     */
    public function setFTE($fTE)
    {
        $this->fTE = $fTE;
    }

    /**
     * @return string
     */
    public function getNameCode()
    {
        return $this->nameCode;
    }

    /**
     * @param string $nameCode
     */
    public function setNameCode($nameCode)
    {
        $this->nameCode = $nameCode;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getDepartmentCategory()
    {
        return $this->departmentCategory;
    }

    /**
     * @param int $departmentCategory
     */
    public function setDepartmentCategory($departmentCategory)
    {
        $this->departmentCategory = $departmentCategory;
    }

    /**
     * @return mixed
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    public function __toString() {
        return $this->staffName;
    }

}

