<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChatdetalleController extends AbstractController
{
    /**
     * @Route("/chatdetalle", name="chatdetalle")
     */
    public function index()
    {
        return $this->render('chatdetalle/index.html.twig', [
            'controller_name' => 'ChatdetalleController',
        ]);
    }
}
