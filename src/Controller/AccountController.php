<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/connexion', name: 'connexion')]
    public function home(): Response
    {
        return $this->render('account/index.html.twig');
    }
}
