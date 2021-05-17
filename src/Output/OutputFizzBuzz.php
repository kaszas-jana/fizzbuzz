<?php
declare(strict_types = 1);

namespace App\Output;

final class OutputFizzBuzz implements OutputInterface
{
    use OutputSingletonTrait;

    public function print(): void
    {
        printf('%s%s', self::OUTPUT_FIZZBUZZ, \PHP_EOL);
    }
}
