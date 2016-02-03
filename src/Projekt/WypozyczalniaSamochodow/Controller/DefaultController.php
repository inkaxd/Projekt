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
use Projekt\WypozyczalniaSamochodow\Form\ConfType;

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
     * @Route("/configuration/{id}", name="configuration")
     * @Template()
     */
    public function configurationAction($id, Request $Request)
    {
        //wyciągnięcie danych użytkownka
		$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) {
				throw new AccessDeniedException('Zaloguj się!');
			}
		
		
		//wyciagniecie samochodi po ID
		$car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->findOneById($id);
		
	
		//tworzenie formularza
		$C = new Cart();
        $form = $this->createForm(new ConfType(), $C);
		
		$form->handleRequest($Request);
        if ($form->isValid()) {
				
			$C -> setCarID($car->getId());
			$C -> setName($car->getName());
			$C -> setUserID($user->getId());
			$C -> setPrice($car->getPrice());
			$C -> setOK(0);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($C);
			$em->flush();			
			
			return $this->redirect($this->generateUrl('cart_homepage'));
		}
		
		return $this->render('ProjektWypozyczalniaSamochodow:Default:configuration.html.twig', array(
			'car' => $car,
			'form' => $form->createView(),
		));
    }
	
	/**
     * @Route("/pay", name="pay")
     * @Template()
     */
    public function payAction(Request $Request)
    {
		$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) {
				throw new AccessDeniedException('Zaloguj się!');
			}
			
		$items = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Cart')
        ->findByUserID($user->getId());	
		
		
		$em = $this->getDoctrine()->getManager();
		
		//zmienianie OK na 1 tzn ze jest zapłacony
		foreach ($items as $item) {
			$item->setOK(1);
			
			$em->persist($item);
			$em->flush();	
			
		}
		
        return $this->redirect($this->generateUrl('history_homepage'));
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
			
		//wyciąganie zapłaconych samochodów
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
	 Liczenie pieniążków
     */
	 
    public function cartAction(Request $request)
    {
		
	$user = $this->getUser();
			if (!is_object($user) || !$user instanceof UserInterface) {
				throw new AccessDeniedException('Zaloguj się!');
			}
	
	
	$cart = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Cart')
        ->findBy(array('userID' => $user->getId(), 'OK' => 0));
		
		
		$hajs = 0;
		
	foreach ($cart as $c) {
	
		$data1 = strtotime($c->getParam1());
		$data2 = strtotime($c->getParam2());
		
		$s = $data2 - $data1; //ilość sekund
		$dni = (($s/60)/60)/24;
		$hajs = $hajs + ($dni * $c->getPrice());
		
			if ($c->getParam3() == 'TAK'){
				$hajs = $hajs + 50;
			}
			
			if ($c->getParam4() == 'TAK'){
				$hajs = $hajs + 60;
			}
			
		$hajs = $hajs + ($c->getParam5() * 100);
		
	}
	
	
	$cars = array();
	
	foreach ($cart as $c) {
		$cars[] = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->findOneById($c->getCarID());
	}
        return $this->render('ProjektWypozyczalniaSamochodow:Default:cart.html.twig', array(
		'cart' => $cart,
		'cars' => $cars,
		'hajs' => $hajs,
		));
		
		
    }
	
}
