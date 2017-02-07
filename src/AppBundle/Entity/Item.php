<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="itemName", type="string", length=255)
     */
    private $itemName;

    /**
     * @var int
     *
     * @ORM\Column(name="category", type="integer")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="totalHrs", type="integer")
     */
    private $totalHrs;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\staff4Item", mappedBy="item", cascade={"persist"})
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
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @param string $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getTotalHrs()
    {
        return $this->totalHrs;
    }

    /**
     * @param int $totalHrs
     */
    public function setTotalHrs($totalHrs)
    {
        $this->totalHrs = $totalHrs;
    }

    /**
     * @return mixed
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param mixed $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    public function addAssignments(staff4Item $assignments)
    {
        $this->assignments->add($assignments);
        //$assignments->setItem($this);

    }

    public function removeAssignments(staff4Item $assignments)
    {
        // ...
    }

    public function __toString() {
        return $this->itemName;
    }

}

