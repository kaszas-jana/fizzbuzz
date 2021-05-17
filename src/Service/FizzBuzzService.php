<?php
declare(strict_types = 1);

namespace App\Service;

use App\Comparable\IntegerInterface;

/**
 * Class FizzBuzzService
 */
class FizzBuzzService
{
    /** @var IntegerInterface */
    private $fizzInteger;

    /** @var IntegerInterface */
    private $buzzInteger;

    public function __construct(IntegerInterface $fizzInteger, IntegerInterface $buzzInteger)
    {
        $this->fizzInteger = $fizzInteger;
        $this->buzzInteger = $buzzInteger;
    }

    public function isFizzOnly(IntegerInterface $toCompare): bool
    {
        return $toCompare->isMultipleOf($this->fizzInteger) && !$toCompare->isMultipleOf($this->buzzInteger);
    }

    public function isBuzzOnly(IntegerInterface $toCompare): bool
    {
        return $toCompare->isMultipleOf($this->buzzInteger) && !$toCompare->isMultipleOf($this->fizzInteger);
    }

    public function isFizzBuzz(IntegerInterface $toCompare): bool
    {
        return $toCompare->isMultipleOf($this->fizzInteger) && $toCompare->isMultipleOf($this->buzzInteger);
    }
}
