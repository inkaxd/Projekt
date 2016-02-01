<?php

namespace Projekt\WypozyczalniaSamochodow\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
  * @ORM\Entity
  * @ORM\Table
  */
class Car
{
	 /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	 
	 /*numer id samochodu*/
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	 /*nazwa samochodu*/
	protected $name;
	
	/**
     * @ORM\Column(type="string", length=350)
     */
	 /*link do stony samochodu*/
	protected $link;
	
	/**
     * @ORM\Column(type="string", length=5)
     */
	 /*ranking samochodu*/
	protected $rate;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*kategoria samochodu*/
	protected $genre;
	
	/**
     * @ORM\Column(type="text")
     */
	 /*grafika samochodu*/
    protected $image;
	
	
	/**
     * @ORM\Column(type="integer")
     */
	 /*rocznik samochodu*/
	protected $year;
	
	/**
     * @ORM\Column(type="integer")
     */
	 /*cena wypożyczenia samochodu*/
    protected $price;
	
	/**
     * @ORM\Column(type="text")
     */
	 /*opis samochodu*/
    protected $description;
	
	/**
     * @ORM\Column(type="integer")
     */
	 /*czy nie wyrzucic*/
	protected $loan;

	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*ilość drzwi samochodu*/
	protected $param1;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*pojemnosc silnika samochodu*/
	protected $param2;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*rodzaj paliwa samochodu*/
	protected $param3;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*liczba miejsc samochodu*/
	protected $param4;
	
	/**
     * @ORM\Column(type="string", length=30)
     */
	 /*skrzynia biegow samochodu*/
	protected $param5;
	
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
     * @return Car
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
     * Set rate
     *
     * @param string $rate
     * @return Car
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Car
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Car
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Car
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
     * Set loan
     *
     * @param integer $loan
     * @return Car
     */
    public function setLoan($loan)
    {
        $this->loan = $loan;

        return $this;
    }

    /**
     * Get loan
     *
     * @return integer 
     */
    public function getLoan()
    {
        return $this->loan;
    }

	
	 /**
     * Set link
     *
     * @param string $link
     * @return Car
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

	
	/**
     * Get link
     *
     * @return string 
     */
	public function getLink()
    {
        return $this->link;
    }
	
	 /**
     * Set param1
     *
     * @param string $param1
     * @return Car
     */
    public function setParam1($param1)
    {
        $this->name = $param1;

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
     * @return Car
     */
    public function setParam2($param2)
    {
        $this->name = $param2;

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
     * @return Car
     */
    public function setParam3($param3)
    {
        $this->name = $param3;

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
     * @return Car
     */
    public function setParam4($param4)
    {
        $this->name = $param4;

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
     * @return Car
     */
    public function setParam5($param5)
    {
        $this->name = $param5;

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
}
