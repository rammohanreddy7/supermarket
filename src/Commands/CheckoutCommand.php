<?php

namespace Virtusa\Assignment\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Virtusa\Assignment\Math\Checkout;

class CheckoutCommand extends Command
{
    /**
     * The name of the command (the part after "bin/console").
     *
     * @var string
     */
    protected static $defaultName = 'checkout';

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int 0 if everything went fine, or an exit code.
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $totalPrice = 0;

        $quantityA = (int)$io->ask("What is the quantity for A", 0);
        if ($quantityA !== 0) {
            $priceForA = $this->checkout('A', $quantityA, $output);
            $totalPrice += $priceForA;
            $output->writeln(sprintf('Total Checkout Price: %d', $totalPrice));
            $output->writeln('');
        }

        $quantityB = (int)$io->ask("What is the quantity for B", 0);
        if ($quantityB !== 0) {
            $priceForB = $this->checkout('B', $quantityB, $output);
            $totalPrice += $priceForB;
            $output->writeln(sprintf('Total Checkout Price: %d', $totalPrice));
            $output->writeln('');
        }

        $quantityC = (int)$io->ask("What is the quantity for C", 0);
        if ($quantityC !== 0) {
            $priceForC = $this->checkout('C', $quantityC, $output);
            $totalPrice += $priceForC;
            $output->writeln(sprintf('Total Checkout Price: %d', $totalPrice));
            $output->writeln('');
        }

        $quantityD = (int)$io->ask("What is the quantity for D", 0);
        if ($quantityD !== 0) {
            $priceForD = $this->checkout('D', $quantityD, $output, $quantityA);
            $totalPrice += $priceForD;
            $output->writeln(sprintf('Total Checkout Price: %d', $totalPrice));
            $output->writeln('');
        }

        $quantityE = (int)$io->ask("What is the quantity for E", 0);
        if ($quantityE !== 0) {
            $priceForE = $this->checkout('E', $quantityE, $output);
            $totalPrice += $priceForE;
            $output->writeln(sprintf('Total Checkout Price: %d', $totalPrice));
            $output->writeln('');
        }

        return 0;
    }

    private function checkout(string $product, int $quantity, OutputInterface $output, int $quantityA = 0): int
    {
        $checkoutProduct = new Checkout($product, $quantity);
        $price = $checkoutProduct->calculate($quantityA);
        $output->writeln(sprintf('Price for %s: %d', $product, $price));

        return $price;
    }
}