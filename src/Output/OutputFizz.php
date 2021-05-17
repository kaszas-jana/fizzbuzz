<?php
declare(strict_types = 1);

namespace App\Output;

final class OutputFizz implements OutputInterface
{
    use OutputSingletonTrait;

    public function print(): void
    {
        printf('%s%s', self::OUTPUT_FIZZ, \PHP_EOL);
    }
}
