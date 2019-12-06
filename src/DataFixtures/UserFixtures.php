<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('302574757@student.rocmondriaan.nl');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'WelcomeNewMember'));
        $manager->persist($user);
        $user = new User();
        $user->setEmail('mj.vanderLinden@rocmondriaan.nl');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'WelcomeNewMember'));
        $manager->flush();
        $manager->persist($user);


    }
}