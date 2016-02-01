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
	


