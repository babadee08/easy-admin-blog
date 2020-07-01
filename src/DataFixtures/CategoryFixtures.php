<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CategoryFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public static function getReferenceKey($i)
    {
        return sprintf('category_%s', $i);
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 5; $i++) {
            $category = new Category();

            $category->setActive(true);
            $category->setName($this->faker->sentence(3));

            $manager->persist($category);

            $this->addReference(self::getReferenceKey($i), $category);
        }

        $manager->flush();
    }
}
