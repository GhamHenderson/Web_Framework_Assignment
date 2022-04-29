<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomePageTest extends WebTestCase
{
    public function testIsHomePageResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

//    public function testIsPOnHomepage():void{
//        $client = static::createClient();
//        $crawler = $client->request('GET', '/');
//        $this->assertSelectorTextContains('p', 'Please log in or Register to make an order');
//    }
}
