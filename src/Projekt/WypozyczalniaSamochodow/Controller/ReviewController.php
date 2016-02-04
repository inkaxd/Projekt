<?php

namespace Projekt\WypozyczalniaSamochodow\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Projekt\WypozyczalniaSamochodow\Entity\Review;
use Projekt\WypozyczalniaSamochodow\Form\ReviewType;

class ReviewController extends Controller {

	 /**
     * @Route("/add/{$id}")
     * 
     * @Template
     */
    public function addReviewAction($id, Request $Request){
 
        $Review = new Review();
 
        $form = $this->createForm(new ReviewType(), $Review);
		
		 $form->handleRequest($Request);
        if($form->isValid()){
 
            //kod zapisujący dane
			
			$title = $Review->getTitle();
			$description = $Review->getDescription();
			$date = date("Y-m-d H:i:s");
			$user = $this->get('security.token_storage')->getToken()->getUser();
				
			$Review->setTitle($title);
			$Review->setDescription($description);
			$Review->setCarID($id);
			$Review->setUser($user);
			$Review->setDate($date);
			$Review->setActive(0);
			
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($Review);
			$em->flush();	
			
			$url = $this->get('router')->generate('car_homepage', array(
			'id' => $id
			));
				
			$Request->getSession()->getFlashBag()->add(
            'notice','<div class="alert alert-success" role="alert"> Twoja recenzja została dodana i czeka na akceptacje moderatora</div>'
			);
			
			return $this->redirect($this->generateUrl('car_homepage', array(
			'id' => $id
			)));
     }	 
	     $car = $this->getDoctrine() 
        ->getRepository('Projekt\WypozyczalniaSamochodow\Entity\Car')
        ->find($id);


		return $this->render('ProjektWypozyczalniaSamochodow:Review:addReview.html.twig', array(
            'form' => $form->createView(),
			'review' => $Review,
			'car' => $car,
		));
    }


}