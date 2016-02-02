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

}
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
        if($form->isValid())