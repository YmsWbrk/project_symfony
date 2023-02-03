<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        if(!$this->getUser()){
            return $this->render('home/index.html.twig', [
                'title' => 'HelloWorld',
                'articles' => $articleRepository->findAll(),
            ]);
        }else{
            return $this->render('home/connectHome.html.twig', [
                'title' => 'Bienvenue félicitation !',
                'articles' => $articleRepository->findAll(),
            ]);
        }
    }
}
