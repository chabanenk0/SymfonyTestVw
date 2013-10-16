<?php

namespace chab\TestTourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TourCategoryConn3
 */
class TourCategoryConn3
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tour;

    /**
     * @var integer
     */
    private $category;


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
     * Set tour
     *
     * @param integer $tour
     * @return TourCategoryConn3
     */
    public function setTour($tour)
    {
        $this->tour = $tour;
    
        return $this;
    }

    /**
     * Get tour
     *
     * @return integer 
     */
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return TourCategoryConn3
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }
}