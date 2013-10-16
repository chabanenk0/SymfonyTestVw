<?php

namespace chab\TestTourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $info;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tours;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tours = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set category
     *
     * @param string $category
     * @return Category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Category
     */
    public function setInfo($info)
    {
        $this->info = $info;
    
        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Add tours
     *
     * @param \chab\TestTourBundle\Entity\Tour $tours
     * @return Category
     */
    public function addTour(\chab\TestTourBundle\Entity\Tour $tours)
    {
        $this->tours[] = $tours;
    
        return $this;
    }

    /**
     * Remove tours
     *
     * @param \chab\TestTourBundle\Entity\Tour $tours
     */
    public function removeTour(\chab\TestTourBundle\Entity\Tour $tours)
    {
        $this->tours->removeElement($tours);
    }

    /**
     * Get tours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTours()
    {
        return $this->tours;
    }
}
