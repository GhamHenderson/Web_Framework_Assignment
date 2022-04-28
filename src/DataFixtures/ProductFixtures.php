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
            'name' => 'Beef Burger',
            'description' => 'nice fresh beef burger',
            'price' => 2.50,
            'imageFilename' => 'img/burger2.jpg',
            'quantity' => '1'
        ]);
        ProductFactory::createOne([
            'name' => 'Fries',
            'description' => 'nice salted fries',
            'price' => 2.00,
            'imageFilename' => 'img/burger2.jpg',
            'quantity' => '1'
        ]);
        ProductFactory::createOne([
            'name' => 'Chicken Burger',
            'description' => 'Super nice chicken in a burger. i love chicken!',
            'price' => 2.50,
            'imageFilename' => 'img/burger2.jpg',
            'quantity' => '1'
        ]);
    }
}