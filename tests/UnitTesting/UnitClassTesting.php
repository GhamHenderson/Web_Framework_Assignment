<?php

namespace App\Tests\UnitTesting;

use App\Entity\Checkout;
use App\Entity\Product;
use App\Entity\Status;
use App\Entity\Table;
use App\Entity\User;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use TypeError;


class UnitClassTesting extends KernelTestCase
{
    public function test1ProductGetSet()
    {
        $product = new Product();
        $product = $product->setName("Graham");
        $this->assertEquals('Graham', $product->getName());
    }

    public function test2ProductExpectedResult(){
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

    public function test4StatusGetSet(){
        $status = new Status();
        $get = $status->setStatusType("Occupied");
        $set = $status->getStatusType();
        $this->assertEquals($set,$get);
    }

    public function test5UserEraseCredentials(){
        $user = new User();
        $password = "SecretPassword";
        $user->setPassword($password);
        $user->eraseCredentials();
        $result = $user->getPassword();
        $this->assertNotEquals($password,$result);
    }

    public function test6CompareRolesForDifferentUsers(){
        $admin = new User();
        $customer = new User();
        $customer->setRole("ROLE_ADMIN");
        $admin->setRole("ROLE_CUSTOMER");
        $this->assertNotEquals($admin,$customer);
    }

    function test7RemoveTable(){

        $table = new Status();
        $table->setStatusType(null);

        $this->assertLessThan();Than(1, $table->getStatusType());
    }

    /**
     * @throws \Exception
     */
    public function test8PaymentAccepted()
    {
        $Payment = new Checkout();
        $this->assertSame(null, $Payment->getPaymentAccepted());
        $Payment->setPaymentAccepted(false);
        $this->assertSame(false, $Payment->getPaymentAccepted());
    }

    /**
     * @throws \Exception
     */
    public function test9DoRedirection()
    {
        $authSuccess = new LoginFormAuthenticator();
        $authSuccess->onAuthenticationSuccess();

        $this->assertContains(
            'Location: default/index.html.twig', xdebug_get_headers()
        );
    }

    public function test10CheckCardLength()
    {
        $card = new Checkout();
       $card->setCardNumber(15);

       $this->assertGreaterThan(12, $card->getCardNumber());
    }


}