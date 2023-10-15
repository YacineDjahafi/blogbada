<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends AppFixtures
{
    public function load(ObjectManager $manager): void
    {
        for ($count = 0; $count < 20; $count++){
            $title = "Test des fixtures";
            $slug = "text";
            $content = " Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Nunc non quam et lorem porttitor auctor. Cras id ligula at eros vulputate
             luctus tincidunt eleifend nibh. Phasellus sem velit, malesuada et velit quis,
              lacinia imperdiet lectus. Etiam ultrices sem vel viverra vulputate.";
            $featuredText = "Lorem Ipsum";
            $dates = "Du 3 novembre au 6 décembre";
            $age = "à partir de 3 ans";
            $duration = "30mn";
            $article_order = 2;
            $createdAt = new \DateTimeImmutable();

            $article = new Article();
            $article->setTitle($title);
            $article->setSlug($slug);
            $article->setContent($content);
            $article->setFeaturedText($featuredText);
            $article->setDates($dates);
            $article->setAge($age);
            $article->setDuration($duration);
            $article->setCreatedAt($createdAt);
            $article->setArticleOrder($article_order);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
