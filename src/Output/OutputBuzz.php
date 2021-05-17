<?php
declare(strict_types = 1);

namespace App\Output;

final class OutputBuzz implements OutputInterface
{
    use OutputSingletonTrait;

    public function print(): void
    {
        printf('%s%s', self::OUTPUT_BUZZ, \PHP_EOL);
    }
}
