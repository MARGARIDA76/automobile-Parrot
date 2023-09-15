<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConatctController extends AbstractController
{
    #[Route('/conatct', name: 'app_conatct')]
    public function index(): Response
    {
        return $this->render('conatct/index.html.twig', [
            'controller_name' => 'ConatctController',
        ]);
    }
}
