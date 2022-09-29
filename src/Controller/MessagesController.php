<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Messages;
use App\Repository\MessagesRepository;

class MessagesController extends AbstractController
{
    #[Route('/messages', name: 'messages')]
    public function index(MessagesRepository $repo): Response
    {
        $msg = $repo->findAll();

        return $this->render('messages/index.html.twig', [
            'controller_name' => 'MessagesController',
            'msg' => $msg
        ]);
    }
    #[Route('/messages/{id}', name: 'messages_show')]
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Messages::class);
        $msg = $repo->find($id);

        return $this->render('messages/show.html.twig', [
            'msg' => $msg
        ]);
    }
}
