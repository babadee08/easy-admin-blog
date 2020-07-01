<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var Generator
     */
    private $faker;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($this->faker->unique()->email);
            $user->setName($this->faker->name);
            $user->setUsername($this->faker->userName);
            $user->setActive(true);
            $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
