<?php

namespace App\Controller;

use App\Entity\ActionSemaine;
use App\Repository\ActionSemaineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/action-de-la-semaine')]
class UserActionSemaineController extends AbstractController
{
    #[Route('/', name: 'user_action_semaine_index', methods: ['GET'])]
    public function index(ActionSemaineRepository $actionSemaineRepository): Response
    {
        return $this->render('user_action_semaine/index.html.twig', [
            'action_semaines' => $actionSemaineRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'user_action_semaine_show', methods: ['GET'])]
    public function show(ActionSemaine $actionSemaine): Response
    {
        $url = explode('=', $actionSemaine->getVideo(), 2);
        return $this->render('user_action_semaine/show.html.twig', [
            'action_semaine' => $actionSemaine,
            'ytUrl' => $url[1]
        ]);
    }
}
