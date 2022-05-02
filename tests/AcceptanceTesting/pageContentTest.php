<?php

namespace App\Tests\AcceptanceTesting;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class pageContentTest extends WebTestCase
{

    public function testIsHomePageResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#homeP', 'Welcome to our Restauraunt, Please order from our menu and we will deliver to your table!');
    }

    public function testIsMenuPageResponseSuccessfulCorrect(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/product');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#menuH1', 'Menu');
    }

    public function testIsAboutUsPageResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/aboutus');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'so.. Who are we?');
    }

    public function testIsLoginPageResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Please sign in');

    }

    public function testIsRegisterPageResponseSuccessful(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/user/new');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Register for an Account');

    }
}
