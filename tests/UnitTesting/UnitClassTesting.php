<?php

namespace App\Tests\UnitTesting;

use App\Entity\Checkout;
use App\Entity\Product;
use App\Entity\Status;
use App\Entity\Table;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use TypeError;

class UnitClassTesting extends KernelTestCase
{
    public function test1productGetSet()
    {
        $product = new Product();
        $product = $product->setName("Graham");
        $this->assertEquals('Graham', $product->getName());
    }

    public function test2productExpectedResult(){
        // Arrange
        $product = new Product();
        $product->setPrice(2);
        $result = $product->getPrice();
        $expectedResult = 2;
        $this->assertEquals($expectedResult, $result);
    }

    public function test3TableTypeErrorExpected(){
        $table = new Table();
        $this->expectException(TypeError::class);
        $table->setTableCapacity("Throw Error");

    }

    public function test4statusGetSet(){
        $status = new Status();
        $get = $status->setStatusType("Occupied");
        $set = $status->getStatusType();
        $this->assertEquals($set,$get);
    }

    public function test4UserEraseCredentials(){
        $user = new User();
        $password = "SecretPassword";
        $user->setPassword($password);
        $user->eraseCredentials();
        $result = $user->getPassword();
        $this->assertNotEquals($password,$result);
    }
}