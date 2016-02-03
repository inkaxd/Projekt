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
     * @Route("/addToCart", name="addToCart")
     * @Template()
     */
    public function addToCartAction($id, Request $Request)
    {
        
		$car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->find($id);
		
		
		$cart = new Cart();
		
		$cart -> setUserID();
		$cart -> setCarID($car->getId());
		
		return array();
    }

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
     * @Route("/cart", name="cart")
     * @Template()
     */
    public function cartAction(Request $request)
    {
	//trzeba tu napisać odczyt z ciasteczka
	
	$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) {
				throw new AccessDeniedException('Zaloguj się!');
			}
	
	
	$cart = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Cart')
        ->findBy(array('userID' => $user->getId(), 'OK' => 0));
	
	
	$cars = array();
	
	foreach ($cart as $c) {
		$cars[] = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->findOneById($c->getCarID());
	}
	
	
        return $this->render('ProjektWypozyczalniaSamochodow:Default:cart.html.twig', array(
		'cart' => $cart,
		'cars' => $cars,
		//'cost' => $cost,
		//'ID' => $ID,
		));
		
		
    }
	
}
