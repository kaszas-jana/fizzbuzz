<?php
declare(strict_types = 1);

namespace App\Comparable;

use App\Exception\ModuloByZeroException;

class Integer implements IntegerInterface
{
    /** @var int */
    private $integerValue;

    public function __construct(int $integerValue)
    {
        $this->integerValue = $integerValue;
    }

    public function getIntegerValue(): int
    {
       return $this->integerValue;
    }

    /** @throws ModuloByZeroException */
    public function isMultipleOf(IntegerInterface $toCompare): bool
    {
        $toCompareValue = $toCompare->getIntegerValue();
        if (0 === $toCompareValue) {
            throw new ModuloByZeroException();
        }

        return 0 === $this->integerValue % $toCompare->getIntegerValue();
    }
}
