<?php

namespace App\DataFixtures;

use App\Entity\Menu;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\UserFactory;
use App\Factory\MenuFactory;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        MenuFactory::createOne([
            'item_name' => 'fries',
            'item_price' => '2.00',
            'item_description' => 'fresh irish potatoes',
            'is_available' => 'true'

        ]);

    }
}
