<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnuncionpetController extends AbstractController
{
    /**
     * @Route("/anuncionpet", name="anuncionpet")
     */
     //En la seecion de arriba se puede cambiar el nombre de la ruta @Route("/", name="index")
    public function index()
    {
    	$Num1 =1;
    	$Num2 = 100;
    	$Suma = $Num1+$Num2;      
        return $this->render('anuncionpet/index.html.twig',
        array('Num1'=>$Num1, 'Num2'=>$Num2,
        'SumaEntreNumero1y2'=>$Suma));
    }
}
