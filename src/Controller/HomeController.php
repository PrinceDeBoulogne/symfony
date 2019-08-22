<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(\App\Hello\HelloWorld $helloWorld)
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'message' => $helloWorld -> yo(),
            'message' => $helloWorld -> yoUpper()
        ]);
    }
}
