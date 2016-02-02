<?php

namespace Projekt\WypozyczalniaSamochodow\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table
  */
class Review
{
	 /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="integer")
     */
	protected $carID;
	
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $title;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $user;
	
	/**
     * @ORM\Column(type="text")
     */
    protected $description;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	protected $date;
	
	/**
     * @ORM\Column(type="integer", length=1)
     */
	protected $active;
	
	protected $review;
	
	public function getReview() {
  return $this->review;
}

public function setReview($review) {
  $this->review= $review;
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
     * Set carID
     *
     * @param integer $carID
     * @return Review
     */
    public function setCarID($carID)
    {
        $this->carID = $carID;

        return $this;
    }

    /**
     * Get carID
     *
     * @return integer 
     */
    public function getCarID()
    {
        return $this->carID;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Review
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Review
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Review
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Review
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }
	//email: kulpsychologia2014@gmail.com
	//hasło: psychologiakul2014

    /**
     * Set active
     *
     * @param integer $active
     * @return Review
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }
}
