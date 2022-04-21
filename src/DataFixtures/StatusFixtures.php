<?php

namespace App\DataFixtures;

use App\Factory\StatusFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       StatusFactory::createOne( ['statusType' => 'Available']);
       StatusFactory::createOne( ['statusType' => 'Occupied']);
       StatusFactory::createOne( ['statusType' => 'Reserved']);
       StatusFactory::createOne( ['statusType' => 'Out Of Order']);
    }
}
