<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Contact;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();

        $manager = $this->getDoctrine()->getManager();
        
        $form = $this->createFormBuilder($contact)
                     ->add('nom')
                     ->add('prenom')
                     ->add('mail')
                     ->add('message')
                     ->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($contact);
            $manager->flush();
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView()
        ]);
    }
}
