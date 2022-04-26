<?php

namespace App\DataFixtures;

use App\Factory\CheckoutFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CheckoutFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CheckoutFactory::createOne([
            'name_on_card' => 'Graham',
            'card_number' => '1234323323332343',
            'expiry_date' => new \DateTime('2023-05-09'),
            'payment_accepted' => '1'
        ]);
        CheckoutFactory::createOne([
            'name_on_card' => 'James',
            'card_number' => '12343576763332343',
            'expiry_date' => new \DateTime('2023-05-09'),
            'payment_accepted' => '1'
        ]);
    }
}
