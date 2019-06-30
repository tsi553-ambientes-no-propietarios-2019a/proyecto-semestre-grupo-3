<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TipoanuncioController extends AbstractController
{
    /**
     * @Route("/tipoanuncio", name="tipoanuncio")
     */
    public function index()
    {
        return $this->render('tipoanuncio/index.html.twig', [
            'controller_name' => 'TipoanuncioController',
        ]);
    }
}
