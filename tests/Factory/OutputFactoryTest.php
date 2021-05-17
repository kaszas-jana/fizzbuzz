<?php
declare(strict_types=1);

namespace App\Tests\Factory;

use App\Comparable\IntegerInterface;
use App\Factory\OutputFactory;
use App\Output\OutputBuzz;
use App\Output\OutputFizz;
use App\Output\OutputFizzBuzz;
use App\Output\OutputInteger;
use App\Service\FizzBuzzService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OutputFactoryTest extends TestCase
{
    /** @var FizzBuzzService|MockObject */
    private $fizzBuzzServiceMock;

    /** @var OutputFactory */
    private $outputFactory;

    public function setUp(): void
    {
        $this->fizzBuzzServiceMock = $this->createMock(FizzBuzzService::class);
        $this->outputFactory = new OutputFactory($this->fizzBuzzServiceMock);
    }

    public function testCreateShallReturnOutputFizz(): void
    {
        $this->fizzBuzzServiceMock->method('isFizzOnly')->willReturn(true);
        $integerMock = $this->createMock(IntegerInterface::class);
        self::assertInstanceOf(OutputFizz::class, $this->outputFactory->create($integerMock));
    }

    public function testCreateShallReturnOutputBuzz(): void
    {
        $this->fizzBuzzServiceMock->method('isFizzOnly')->willReturn(false);
        $this->fizzBuzzServiceMock->method('isBuzzOnly')->willReturn(true);
        $integerMock = $this->createMock(IntegerInterface::class);
        self::assertInstanceOf(OutputBuzz::class, $this->outputFactory->create($integerMock));
    }

    public function testCreateShallReturnOutputFizzBuzz(): void
    {
        $this->fizzBuzzServiceMock->method('isFizzOnly')->willReturn(false);
        $this->fizzBuzzServiceMock->method('isBuzzOnly')->willReturn(false);
        $this->fizzBuzzServiceMock->method('isFizzBuzz')->willReturn(true);
        $integerMock = $this->createMock(IntegerInterface::class);
        self::assertInstanceOf(OutputFizzBuzz::class, $this->outputFactory->create($integerMock));
    }

    public function testCreateShallReturnOutputInteger(): void
    {
        $this->fizzBuzzServiceMock->method('isFizzOnly')->willReturn(false);
        $this->fizzBuzzServiceMock->method('isBuzzOnly')->willReturn(false);
        $this->fizzBuzzServiceMock->method('isFizzBuzz')->willReturn(false);
        $integerMock = $this->createMock(IntegerInterface::class);
        self::assertInstanceOf(OutputInteger::class, $this->outputFactory->create($integerMock));
    }
}
