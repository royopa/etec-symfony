<?php

namespace App\DataFixtures;

use App\Entity\Sensor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SensorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sensor = new Sensor();
        $sensor->setNome('sensor_umidade');
        $sensor->setTopicName('cli-mlk-002-pub/humidity');
        $sensor->setCreatedAt(new \DateTime());
        $sensor->setUpdatedAt(new \DateTime());
        $manager->persist($sensor);

        $sensor = new Sensor();
        $sensor->setNome('sensor_temperatura');
        $sensor->setTopicName('cli-mlk-002-pub/humidity');
        $sensor->setCreatedAt(new \DateTime());
        $sensor->setUpdatedAt(new \DateTime());        
        $manager->persist($sensor);

        $manager->flush();
    }
}
