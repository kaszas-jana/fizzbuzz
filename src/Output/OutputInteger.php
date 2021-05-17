<?php
declare(strict_types = 1);

namespace App\Output;

use App\Comparable\IntegerInterface;

class OutputInteger implements OutputInterface
{
    /** @var IntegerInterface */
    private $integerInterface;

    public function __construct(IntegerInterface $integerInterface)
    {
        $this->integerInterface = $integerInterface;
    }

    public function print(): void
    {
        printf('%d%s', $this->integerInterface->getIntegerValue(), \PHP_EOL);
    }
}
