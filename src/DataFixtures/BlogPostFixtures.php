<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class BlogPostFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 30; $i++) {
            /** @var Category $category */
            $category = $this->getReference(CategoryFixtures::getReferenceKey($i % 5));

            $blogPost = new BlogPost();
            $blogPost->setCategory($category);
            $blogPost->setTitle($this->faker->sentence(5));
            $blogPost->setContent($this->faker->text);
            $blogPost->setPublishedAt($this->faker->dateTimeBetween('-20 days', '-1 days'));

            $manager->persist($blogPost);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
