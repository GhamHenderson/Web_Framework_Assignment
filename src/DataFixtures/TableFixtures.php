<?php

namespace App\DataFixtures;


use App\Entity\Table;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class TableFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 12; $i++) {
            $table = new Table();
            $table
                ->setTableAvailable(true)
                ->setTableCapacity(mt_rand(2, 8));
            $manager->persist($table);
        }
        $manager->flush();
    }
}
