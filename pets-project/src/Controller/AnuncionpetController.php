<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnuncionpetController extends AbstractController
{
    /**
     * @Route("/anuncionpet", name="anuncionpet")
     */
    public function index()
    {
        return $this->render('anuncionpet/index.html.twig', [
            'controller_name' => 'AnuncionpetController',
        ]);
    }
}
