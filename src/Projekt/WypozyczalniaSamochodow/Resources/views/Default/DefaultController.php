<?php

namespace Projekt\WypozyczalniaSamochodow\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use FOS\UserBundle\Model\UserInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Projekt\WypozyczalniaSamochodow\Entity\Cart;
use Projekt\WypozyczalniaSamochodow\Entity\Car;

use Projekt\WypozyczalniaSamochodow\Form\CartType;

class DefaultController extends Controller
{
    public function indexAction()
    {
	
	$news = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
		->findBy(
			array(),
			array('id' => 'DESC')
			
		);
		
	$loan = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
		->findBy(
			array(),
			array('loan' => 'DESC')	
	);
	
	$review = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Review')
		->findBy(
		array('active' => 1)
		);
		
        return $this->render('ProjektWypozyczalniaSamochodow:Default:index.html.twig', array(
		'news' => $news,
		'loan' => $loan,
		'review' => $review,
		));
    }
	
	
	/**
     * @Route("/genre/{$genre}", name="contact")
     * @Template()
     */
    public function genreAction($genre)
    {
	
	$car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
		->findBy(
		array('genre' => $genre)
		);
	
	
        return $this->render('ProjektWypozyczalniaSamochodow:Default:genre.html.twig', array(
			'genre' => $genre,
			'car' => $car,
		));
    }
	
	/**
     * @Route("/show/{$id}", name="show")
     * @Template()
     */
    public function showAction($id)
    {
		
		$carID = $id;
		$userID = $this->getUser()->getId();
		$tab = array ();
	
		 $film = $this->getDoctrine() 
			->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Order')
			->findBy(
			array('carID' => $carID, 'userID' => $userID)
			);
			
		if (!$film) {
			return $this->redirect($this->generateUrl('demo_homepage'));
		}
			
		
		 $car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->find($id);
			
		if (!$car) {
			 throw $this->createNotFoundException('No product found for id '.$id);
		}
	
	
        return $this->render('ProjektWypozyczalniaSamochodow:Default:show.html.twig', array(
			'car' => $car,
			'carID' => $carID,
		));
    }
	