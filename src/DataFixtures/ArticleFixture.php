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
            $content = " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non quam et lorem porttitor auctor. Cras id ligula at eros vulputate luctus tincidunt eleifend nibh. Phasellus sem velit, malesuada et velit quis, lacinia imperdiet lectus. Etiam ultrices sem vel viverra vulputate. Aenean vehicula at sem nec semper. Quisque porttitor ex tristique purus facilisis semper. Curabitur ornare nibh vel fringilla tempor. In posuere mauris eu augue cursus, vitae mattis sapien volutpat. In rutrum vitae mauris eget fermentum. Sed vitae faucibus lacus. Nunc vel maximus sem. Nulla nec tempus tortor, nec tincidunt velit. Integer venenatis neque urna, eu suscipit odio malesuada fringilla. Aenean blandit odio at consequat feugiat. Nullam id metus mi. Vestibulum odio metus, auctor eu odio at, suscipit efficitur est. In consequat dapibus sem, in posuere felis laoreet eu. Cras venenatis velit eget laoreet mollis. Quisque sagittis vel velit hendrerit maximus. Proin eleifend, massa nec lobortis hendrerit, mauris est elementum ligula, ut sagittis eros libero a augue. Donec sed metus nec metus tristique sagittis ullamcorper quis risus. Phasellus non magna aliquam, lacinia turpis at, vulputate quam. Integer rhoncus est eget semper placerat. Integer quis urna neque. Curabitur congue arcu in egestas tincidunt. Sed tristique mauris in tincidunt posuere. Nullam molestie sollicitudin tempor. Sed quis commodo orci, nec porttitor eros. Nunc quis ornare neque, nec ultricies nulla. ";
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
