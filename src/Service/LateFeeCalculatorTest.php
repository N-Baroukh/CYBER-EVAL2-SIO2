<?php

namespace App\Service;

use App\Entity\LateFeeCalculator;
use PHPUnit\Framework\TestCase;

class LateFeeCalculatorTest extends TestCase
{
    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate) : float
    {
        if ($returnDate->getTimestamp() < $dueDate->getTimestamp() || $returnDate->getTimestamp() == $dueDate->getTimestamp())
        {
            return 0;
        }
        $cout = 0.5;
        return $cout * $returnDate->diff($dueDate)->days;
    }
}