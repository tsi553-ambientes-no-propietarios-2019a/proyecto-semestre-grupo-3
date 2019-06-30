<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CantonesController extends AbstractController
{
    /**
     * @Route("/cantones", name="cantones")
     */
    public function index()
    {
        return $this->render('cantones/index.html.twig', [
            'controller_name' => 'CantonesController',
        ]);
    }
}
