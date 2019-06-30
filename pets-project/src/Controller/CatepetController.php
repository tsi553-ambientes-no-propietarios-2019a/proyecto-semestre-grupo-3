<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CatepetController extends AbstractController
{
    /**
     * @Route("/catepet", name="catepet")
     */
    public function index()
    {
        return $this->render('catepet/index.html.twig', [
            'controller_name' => 'CatepetController',
        ]);
    }
}
