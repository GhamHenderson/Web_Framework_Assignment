<?php

namespace App\DataFixtures;

use App\Factory\BookingFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        BookingFactory::createOne([
            'beginAt' => '2022-04-19 11:00:25',
            'endAt' => '2022-04-19 12:00:33',
            'title' => 'Breakfast'
        ]);
        BookingFactory::createOne([
            'beginAt' => '2022-04-22 16:00:25',
            'endAt' => '2022-04-2 18:00:33',
            'title' => 'Dinner'
        ]);
    }
}
