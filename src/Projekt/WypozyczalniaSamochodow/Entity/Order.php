<?php

namespace Projekt\WypozyczalniaSamochodow\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table
  */
class Order
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
     * @ORM\Column(type="integer")
     */
	protected $userID;



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
     * @return Order
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
     * Set userID
     *
     * @param integer $userID
     * @return Order
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return integer 
     */
    public function getUserID()
    {
        return $this->userID;
    }
}
