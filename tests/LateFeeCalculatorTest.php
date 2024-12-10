<?php

namespace App\Tests;

use App\Entity\LateFeeCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LateFeeCalculatorTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
    public function testCalculateLateFee(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-04');

        $this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
    }
    public function testDateEchnace(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2023-12-30');
        $this->assertEquals(0.0, $calculator->calculateLateFee($dueDate, $returnDate));
    }

    public function testMemeJour(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-01');
        $this->assertEquals(0.0, $calculator->calculateLateFee($dueDate, $returnDate));
    }
}
