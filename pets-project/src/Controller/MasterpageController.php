<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MasterpageController extends AbstractController
{
    /**
     * @Route("/masterpage", name="masterpage")
     */
    public function index()
    {
        return $this->render('masterpage/index.html.twig', [
            'controller_name' => 'MasterpageController',
        ]);
    }
}
