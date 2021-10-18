<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\ArticleRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{	
	#[Route('/', name: 'home', methods: ['GET'])]
	public function home(VideoRepository $videoRepository, ArticleRepository $articleRepository)
	{	
		$dernièreVideo = $videoRepository->findOneBy(array(), array('id' => 'desc'),1);
		$dernierArticle = $articleRepository->findOneBy(array(), array('id' => 'desc'),1);
		$url = explode('=', $dernièreVideo->getLien(), 2);
		return $this->render('home/home.html.twig',[
			"video" => $dernièreVideo,
			"article" => $dernierArticle,
			"ytUrl" => $url[1]
		]);
	}
}
