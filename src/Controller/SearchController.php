<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\ArticleRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un mot clé'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/resultat-recherche", name="handleSearch")
     * @param Request $request
     */
    public function handleSearch(Request $request, VideoRepository $videoRepo, ArticleRepository $articleRepo)
    {
        $query = $request->request->get('form')['query'];
        if($query) {
            $vidéos = $videoRepo->findVideosByKey($query);
            $articles = $articleRepo->findArticlesByKey($query);
        }
        return $this->render('search/index.html.twig', [
            'video' => $vidéos,
            'article' => $articles,
        ]);
    }
}
