<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProvinciasController extends AbstractController
{
    /**
     * @Route("/provincias", name="provincias")
     */
    public function index()
    {
        return $this->render('provincias/index.html.twig', [
            'controller_name' => 'ProvinciasController',
        ]);
    }
}
