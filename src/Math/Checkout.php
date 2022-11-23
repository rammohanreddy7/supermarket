<?php

namespace Virtusa\Assignment\Math;

use Exception;

class Checkout
{
    private string $product;
    private int $quantity;

    private const A_REGULAR_PRICE = 50;
    private const A_SPECIAL_PRICE_FOR_3 = 130;

    private const B_REGULAR_PRICE = 30;
    private const B_SPECIAL_PRICE_FOR_2 = 45;

    private const C_REGULAR_PRICE = 30;
    private const C_SPECIAL_PRICE_FOR_2 = 38;
    private const C_SPECIAL_PRICE_FOR_3 = 50;

    private const D_REGULAR_PRICE = 15;
    private const D_SPECIAL_PRICE_WITH_A = 5;

    private const E_REGULAR_PRICE = 5;

    public function __construct(string $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function calculate(int $aQuantity = 0): int
    {
        switch ($this->product) {
            case 'A':
                return $this->calculateA();
            case 'B':
                return $this->calculateB();
            case 'C':
                return $this->calculateC();
            case 'D':
                return $this->calculateD($aQuantity);
            case 'E':
                return $this->calculateE();
            default:
                throw new Exception('Product not found in Store');
        }
    }

    private function calculateA(): int
    {
        $quantityOfThrees = (int)($this->quantity / 3);
        $remainingQuantity = $this->quantity % 3;

        return ($quantityOfThrees * self::A_SPECIAL_PRICE_FOR_3) + ($remainingQuantity * self::A_REGULAR_PRICE);
    }

    private function calculateB(): int
    {
        $quantityOfTwos = (int)($this->quantity / 2);
        $remainingQuantity = $this->quantity % 2;

        return ($quantityOfTwos * self::B_SPECIAL_PRICE_FOR_2) + ($remainingQuantity * self::B_REGULAR_PRICE);
    }

    private function calculateC(): int
    {
        $quantityOfThrees = (int)($this->quantity / 3);
        $remainingQuantity = ($this->quantity % 3);

        $quantityOfTwos = (int)($remainingQuantity / 2);
        $leftOverQuantity = $remainingQuantity % 2;

        return ($quantityOfThrees * self::C_SPECIAL_PRICE_FOR_3) +
            ($quantityOfTwos * self::C_SPECIAL_PRICE_FOR_2) +
            ($leftOverQuantity * self::C_REGULAR_PRICE);
    }

    private function calculateD(int $aQuantity): int
    {
        $dQuantity = $this->quantity;

        if ($dQuantity <= $aQuantity) {
            $price = $dQuantity * self::D_SPECIAL_PRICE_WITH_A;
        } else {
            $price = $aQuantity * self::D_SPECIAL_PRICE_WITH_A;
            $price += ($dQuantity - $aQuantity) * self::D_REGULAR_PRICE;
        }

        return $price;
    }

    private function calculateE(): int
    {
        return $this->quantity * self::E_REGULAR_PRICE;
    }
}