<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\InscriptionForm;
use AppBundle\Entity\Relation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class InscriptionController extends Controller
{
  
  public function formAction(Request $request)
  {
     $user = new User();
     $form = $this->createForm(InscriptionForm::class, $user);

     $form->handleRequest($request);

     if($form->isSubmitted())
     {
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();
      return new Response('User ajouté');
     }

     $formView = $form->createView();
     return $this->render(':User:inscription.html.twig', array('form'=>$formView));
  }

  
  public function editAction(Request $request, User $user)
  {
    $form = $this->createForm(InscriptionForm::class, $user);

     $form->handleRequest($request);

     if($form->isSubmitted())
     {
      $em = $this->getDoctrine()->getManager();
      $em->flush();
      return new Response('User modify');
    }
      
      $formView = $form->createView();
     return $this->render(':User:inscription.html.twig', array('form'=>$formView));
  

}
}