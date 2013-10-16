<?php

namespace chab\TestTourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 */
class City
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $info;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Tour;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Tour = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return City
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
     * Set info
     *
     * @param string $info
     * @return City
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
     * Add Tour
     *
     * @param \chab\TestTourBundle\Entity\Tour $tour
     * @return City
     */
    public function addTour(\chab\TestTourBundle\Entity\Tour $tour)
    {
        $this->Tour[] = $tour;
    
        return $this;
    }

    /**
     * Remove Tour
     *
     * @param \chab\TestTourBundle\Entity\Tour $tour
     */
    public function removeTour(\chab\TestTourBundle\Entity\Tour $tour)
    {
        $this->Tour->removeElement($tour);
    }

    /**
     * Get Tour
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTour()
    {
        return $this->Tour;
    }
}
