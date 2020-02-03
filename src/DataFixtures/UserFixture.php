<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{

    private $enconder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->enconder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $userAdmin = (new User())->setUsername('invillia');
        $password = $this->enconder->encodePassword($userAdmin, 'invillia');
        $userAdmin->setPassword($password);

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
