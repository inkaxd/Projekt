<?php

namespace Projekt\WypozyczalniaSamochodow\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table
  */
class Cart
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
     * @ORM\Column(type="string", length=150)
     */
	protected $userID;
	
	/**
     * @ORM\Column(type="integer")
     */
	protected $carID;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $name;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $param1;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $param2;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $param3;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $param4;
	
	/**
     * @ORM\Column(type="string", length=150)
     */
	protected $param5;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
	protected $price;
	
	
	/**
     * @ORM\Column(type="integer")
     */
	protected $OK; // 1 - transakcja zfinalizowana, 0 - transakcja w trakcie
	
	
	

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
     * Set userID
     *
     * @param string $userID
     * @return Cart
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return string 
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set carID
     *
     * @param integer $carID
     * @return Cart
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
     * Set param1
     *
     * @param string $param1
     * @return Cart
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;

        return $this;
    }

    /**
     * Get param1
     *
     * @return string 
     */
    public function getParam1()
    {
        return $this->param1;
    }

    /**
     * Set param2
     *
     * @param string $param2
     * @return Cart
     */
    public function setParam2($param2)
    {
        $this->param2 = $param2;

        return $this;
    }

    /**
     * Get param2
     *
     * @return string 
     */
    public function getParam2()
    {
        return $this->param2;
    }

    /**
     * Set param3
     *
     * @param string $param3
     * @return Cart
     */
    public function setParam3($param3)
    {
        $this->param3 = $param3;

        return $this;
    }

    /**
     * Get param3
     *
     * @return string 
     */
    public function getParam3()
    {
        return $this->param3;
    }

    /**
     * Set param4
     *
     * @param string $param4
     * @return Cart
     */
    public function setParam4($param4)
    {
        $this->param4 = $param4;

        return $this;
    }

    /**
     * Get param4
     *
     * @return string 
     */
    public function getParam4()
    {
        return $this->param4;
    }

    /**
     * Set param5
     *
     * @param string $param5
     * @return Cart
     */
    public function setParam5($param5)
    {
        $this->param5 = $param5;

        return $this;
    }

    /**
     * Get param5
     *
     * @return string 
     */
    public function getParam5()
    {
        return $this->param5;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Cart
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
     * Set price
     *
     * @param string $price
     * @return Cart
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set OK
     *
     * @param integer $oK
     * @return Cart
     */
    public function setOK($oK)
    {
        $this->OK = $oK;

        return $this;
    }

    /**
     * Get OK
     *
     * @return integer 
     */
    public function getOK()
    {
        return $this->OK;
    }
}
