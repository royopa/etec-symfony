<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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
        $user->setEmail('royopa@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('emilia.brasilio@etec.sp.gov.br');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('ailton.santos58@etec.sp.gov.br');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('flavio.okita@etec.sp.gov.br');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('jose.neto196@etec.sp.gov.br');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('daniel.scarpin@etec.sp.gov.br');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'etecSenha'
        ));        

        $manager->persist($user);

        $manager->flush();
    }
}

