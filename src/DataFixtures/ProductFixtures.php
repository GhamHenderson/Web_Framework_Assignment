<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use App\Factory\ProductFactory;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ProductFactory::createOne([
            'name' => 'item1',
            'description' => 'nice',
            'price' => 2.50,
            'image' => 'img/burger2.jpg'
        ]);
        ProductFactory::createOne([
            'name' => 'item2',
            'description' => 'nice',
            'price' => 2.00,
            'image' => 'img/burger2.jpg'
        ]);
        ProductFactory::createOne([
            'name' => 'item3',
            'description' => 'Super nice',
            'price' => 2.50,
            'image' => 'img/burger2.jpg'
        ]);
    }
}
