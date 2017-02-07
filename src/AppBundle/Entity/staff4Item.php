<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * staff4Item
 *
 * @ORM\Table(name="staff4_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\staff4ItemRepository")
 */
class staff4Item
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
     * @var int
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Staff", inversedBy="assignments")
     * @ORM\JoinColumn(name="staff_id", referencedColumnName="id", nullable=false)
     */
    private $staff;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Item", inversedBy="assignments")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id", nullable=false)
     */
    private $item;

    /**
     * @var int
     *
     * @ORM\Column(name="allocatedHrs", type="integer")
     */
    private $allocatedHrs;

    /**
     * @return int
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param int $staff
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;
    }

    /**
     * @return int
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param int $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return int
     */
    public function getAllocatedHrs()
    {
        return $this->allocatedHrs;
    }

    /**
     * @param int $allocatedHrs
     */
    public function setAllocatedHrs($allocatedHrs)
    {
        $this->allocatedHrs = $allocatedHrs;
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

}

