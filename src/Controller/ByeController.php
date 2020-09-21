<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ByeController extends AbstractController
{
    /**
     * @Route("/bye", name="bye")
     */
    public function index()
    {
        return $this->render('bye/index.html.twig', [
            'controller_name' => 'ByeController',
        ]);
    }
}
