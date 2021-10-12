<?php

namespace App\Controller;

use App\Entity\ActionSemaine;
use App\Form\ActionSemaineType;
use App\Repository\ActionSemaineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/action-de-la-semaine')]
class ActionSemaineController extends AbstractController
{
    #[Route('/', name: 'action_semaine_index', methods: ['GET'])]
    public function index(ActionSemaineRepository $actionSemaineRepository): Response
    {
        return $this->render('action_semaine/index.html.twig', [
            'action_semaines' => $actionSemaineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'action_semaine_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $actionSemaine = new ActionSemaine();
        $form = $this->createForm(ActionSemaineType::class, $actionSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actionSemaine);
            $entityManager->flush();

            return $this->redirectToRoute('action_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('action_semaine/new.html.twig', [
            'action_semaine' => $actionSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'action_semaine_show', methods: ['GET'])]
    public function show(ActionSemaine $actionSemaine): Response
    {
        return $this->render('action_semaine/show.html.twig', [
            'action_semaine' => $actionSemaine,
        ]);
    }

    #[Route('/{id}/edit', name: 'action_semaine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ActionSemaine $actionSemaine): Response
    {
        $form = $this->createForm(ActionSemaineType::class, $actionSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('action_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('action_semaine/edit.html.twig', [
            'action_semaine' => $actionSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'action_semaine_delete', methods: ['POST'])]
    public function delete(Request $request, ActionSemaine $actionSemaine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actionSemaine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actionSemaine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('action_semaine_index', [], Response::HTTP_SEE_OTHER);
    }
}
