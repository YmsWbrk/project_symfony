<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 15; $i ++){
            $article = new Article();

            $article->setTitle("Titre article n°".$i)
            ->setContent("Contenu d'article n°".$i)
            ->setImg("https://via.placeholder.com/150")
            ->setState(false)
            ->setCreatedAt(new \DateTime())
            ->setAuthor("autor");
            $manager->persist($article);
        }

        $manager->flush();
    }
}
