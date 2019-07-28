<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\AdPetsRepository;

class LuckyController extends AbstractController
{


	/**
      * @Route("/", name="homepage")
      */
     public function index(AdPetsRepository $adPetsRepository): Response
    {
        

        return $this->render('lucky/number.html.twig', [
            'ad_pets' => $adPetsRepository -> findAll(),
        ]);
    }
}