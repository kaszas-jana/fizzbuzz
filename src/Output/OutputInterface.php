<?php
declare(strict_types = 1);

namespace App\Output;

interface OutputInterface
{
    public const OUTPUT_FIZZ = 'Fizz';
    public const OUTPUT_BUZZ = 'Buzz';
    public const OUTPUT_FIZZBUZZ = self::OUTPUT_FIZZ.self::OUTPUT_BUZZ;

    public function print(): void;
}