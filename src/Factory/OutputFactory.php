<?php
declare(strict_types = 1);

namespace App\Factory;

use App\Comparable\IntegerInterface;
use App\Output\OutputBuzz;
use App\Output\OutputFizz;
use App\Output\OutputFizzBuzz;
use App\Output\OutputInteger;
use App\Output\OutputInterface;
use App\Service\FizzBuzzService;

class OutputFactory
{
    /** @var FizzBuzzService */
    private $fizzBuzzService;

    public function __construct(FizzBuzzService $fizzBuzzService)
    {
        $this->fizzBuzzService = $fizzBuzzService;
    }

    public function create(IntegerInterface $integer): OutputInterface
    {
        if ($this->fizzBuzzService->isFizzOnly($integer)) {
            return OutputFizz::getInstance();
        }

        if ($this->fizzBuzzService->isBuzzOnly($integer)) {
            return OutputBuzz::getInstance();
        }

        if ($this->fizzBuzzService->isFizzBuzz($integer)) {
            return OutputFizzBuzz::getInstance();
        }

        return new OutputInteger($integer);
    }
}
