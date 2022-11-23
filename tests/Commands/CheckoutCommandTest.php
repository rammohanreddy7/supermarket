<?php

namespace Tests\Commands;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Virtusa\Assignment\Commands\CheckoutCommand;

class CheckoutCommandTest extends TestCase
{
    public function testCheckoutCommand()
    {
        // Arrange
        $application = new Application();
        $application->add(new CheckoutCommand());

        // create a new tester with the Checkout Command
        $tester   = new CommandTester($application->get('checkout'));

        // Act
        // Inputs for quantities of A, B, C, D, E
        $tester->setInputs([4, 5, 7, 2, 3]);
        $result = $tester->execute([]);

        // Assert
        $output = $tester->getDisplay();
        $this->assertEquals(0, $result);
        $this->assertStringContainsString('Price for A: 180', $output);
        $this->assertStringContainsString('Price for B: 120', $output);
        $this->assertStringContainsString('Price for C: 130', $output);
        $this->assertStringContainsString('Price for D: 10', $output);
        $this->assertStringContainsString('Price for E: 15', $output);
        $this->assertStringContainsString('Total Checkout Price: 455', $output);
    }
}