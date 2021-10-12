<?php

namespace App\Controller;

use App\Entity\Saison;
use App\Repository\SaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/saison')]
class UserSaisonController extends AbstractController
{
    #[Route('/', name: 'user_saison_index', methods: ['GET'])]
    public function index(SaisonRepository $saisonRepository): Response
    {
        return $this->render('user_saison/index.html.twig', [
            'saisons' => $saisonRepository->findAll(),
        ]);
    }


    #[Route('/{id}', name: 'user_saison_show', methods: ['GET'])]
    public function show(Saison $saison): Response
    {
        return $this->render('user_saison/show.html.twig', [
            'saison' => $saison,
        ]);
    }
}
