<?php

namespace App\Tests\AcceptanceTesting;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

class crudAccessTest extends WebTestCase
{
    public function testCustomerCannotSeeTableService(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorNotExists($contentSelector);

    }

    public function testCustomerCannotSeeAdminArea(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $contentSelector = '#admin_area';
        $this->assertSelectorNotExists($contentSelector);

    }


    public function testLoggedInCustomerCannotSeeTableService(): void
    {
        $client = static::createClient();

        $username = 'customer';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorNotExists($contentSelector);

    }

    public function testChefCannotSeeTableService(): void
    {
        $client = static::createClient();

        $username = 'chef';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorNotExists($contentSelector);

    }

    public function testWaiterCanSeeTableService(): void
    {
        $client = static::createClient();

        $username = 'waiter';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorExists($contentSelector);

    }

    public function testManagerCanSeeTableService(): void
    {
        $client = static::createClient();

        $username = 'manager';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorExists($contentSelector);

    }

    public function testAdminCanSeeTableService(): void
    {
        $client = static::createClient();

        $username = 'admin';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#table_service';
        $this->assertSelectorExists($contentSelector);

    }

    public function testAdminCanSeeAdminArea(): void
    {
        $client = static::createClient();

        $username = 'admin';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#admin_area';
        $this->assertSelectorExists($contentSelector);

    }

    public function testWaiterCannotSeeAdminArea(): void
    {
        $client = static::createClient();

        $username = 'waiter';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#admin_area';
        $this->assertSelectorNotExists($contentSelector);

    }

    public function testLoggedInCustomerCannotSeeAdminArea(): void
    {
        $client = static::createClient();

        $username = 'customer';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#admin_area';
        $this->assertSelectorNotExists($contentSelector);

    }

    public function testChefCannotSeeAdminArea(): void
    {
        $client = static::createClient();

        $username = 'chef';
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByUsername($username);
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/');

        $contentSelector = '#admin_area';
        $this->assertSelectorNotExists($contentSelector);

    }
}
