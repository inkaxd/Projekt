<?php

namespace Projekt\WypozyczalniaSamochodow\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Projekt\WypozyczalniaSamochodow\Entity\Car;


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
	
	
	
	/**
     * @Route("/car/{$id}", name="_car")
     * @Template()
     */
	public function carAction($id, Request $Request)
	{
		
	
	$car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->findOneById($id);
		
	$review = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Review')
        ->findBy(array('carID' => $id));
	
	return $this->render('ProjektWypozyczalniaSamochodow:Default:Car.html.twig', array(
	'car' => $car,
	'review' => $review,
	//'form' => $form->createView(),
		));
	}

	
	/**
     * @Route("/allCars", name="allCars")
     * @Template()
     */
    public function allCarsAction()
    {
	
		 $cars = $this->getDoctrine()
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->findAll();
	
	
        return $this->render('ProjektWypozyczalniaSamochodow:Default:allCars.html.twig', array(
			'cars' => $cars,
		));
    }
	/**
     * @Route("/history", name="history")
     * @Template()
     */
    public function historyAction()
    {
	
		$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) {
				throw new AccessDeniedException('Zaloguj się!');
			}
		
		
		$history = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Cart')
        ->findBy(array('userID' => $user->getId(), 'OK' => 1));
	
	
        return $this->render('ProjektWypozyczalniaSamochodow:Default:history.html.twig', array(
			'history' => $history,
		));
    }
	
	
}
