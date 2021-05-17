<?php
declare(strict_types = 1);

namespace App\Exception;

class ModuloByZeroException extends \InvalidArgumentException
{
    public const ERROR_MESSAGE = 'Devision by zero is not defined.';

    public function __construct(?int $code =  0, ?\Throwable $previous = null)
    {
        parent::__construct(self::ERROR_MESSAGE, $code ?? 0, $previous);
    }
}
