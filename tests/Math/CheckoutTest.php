<?php

namespace Tests\Math;

use PHPUnit\Framework\TestCase;
use Virtusa\Assignment\Math\Checkout;

class CheckoutTest extends TestCase
{
    public function test_price_for_A()
    {
        // Arrange
        $quantity = 4;
        $expectedPrice = 180;

        // Act
        $checkoutA = new Checkout('A', $quantity);
        $actualPrice = $checkoutA->calculate();

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }

    public function test_price_for_B()
    {
        // Arrange
        $quantity = 5;
        $expectedPrice = 120;

        // Act
        $checkoutB = new Checkout('B', $quantity);
        $actualPrice = $checkoutB->calculate();

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }

    public function test_price_for_C()
    {
        // Arrange
        $quantity = 7;
        $expectedPrice = 130;

        // Act
        $checkoutC = new Checkout('C', $quantity);
        $actualPrice = $checkoutC->calculate();

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }

    public function test_price_for_D_when_A_has_no_quantity()
    {
        // Arrange
        $quantity = 3;
        $expectedPrice = 45;

        // Act
        $checkoutD = new Checkout('D', $quantity);
        $actualPrice = $checkoutD->calculate(0);

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }

    public function test_price_for_D_when_A_has_quantity()
    {
        // Arrange
        $dQuantity = 3;
        $aQuantity = 2;
        $expectedPrice = 25;

        // Act
        $checkoutD = new Checkout('D', $dQuantity);
        $actualPrice = $checkoutD->calculate($aQuantity);

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }

    public function test_price_for_E()
    {
        // Arrange
        $quantity = 3;
        $expectedPrice = 15;

        // Act
        $checkoutE = new Checkout('E', $quantity);
        $actualPrice = $checkoutE->calculate();

        // Assert
        $this->assertEquals($expectedPrice, $actualPrice);
    }
}