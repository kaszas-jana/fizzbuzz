<?php
declare(strict_types = 1);

namespace App\Comparable;

interface IntegerInterface
{
    public function getIntegerValue(): int;

    public function isMultipleOf(self $toCompare): bool;

}
