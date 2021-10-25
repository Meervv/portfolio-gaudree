<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeilleController extends AbstractController
{
    /**
     * @Route("/veille", name="veille")
     */
    public function index(): Response
    {
        return $this->render('veille/index.html.twig', [
            'controller_name' => 'VeilleController',
        ]);
    }
}
