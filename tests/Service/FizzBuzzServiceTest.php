<?php
declare(strict_types = 1);

namespace App\Tests\Service;

use App\Comparable\IntegerInterface;
use App\Service\FizzBuzzService;
use PHPUnit\Framework\TestCase;

class FizzBuzzServiceTest extends TestCase
{
    /** @var FizzBuzzService */
    private $fizzBuzzService;

    public function setUp(): void
    {
        $fizzIntegerMock = $this->createMock(IntegerInterface::class);
        $buzzIntegerMock = $this->createMock(IntegerInterface::class);

        $this->fizzBuzzService = new FizzBuzzService($fizzIntegerMock, $buzzIntegerMock);
    }
    
    public function providerShallReturnFalse(): array
    {
        return [
            'True,True' => [true, true],
            'False, False' => [false, false],
        ];
    }

    public function testIsFizzOnlyShallReturnTrue(): void
    {
        $toCompareMock = $this->createMock(IntegerInterface::class);
        $toCompareMock->expects(self::at(0))->method('isMultipleOf')->willReturn(true);
        $toCompareMock->expects(self::at(1))->method('isMultipleOf')->willReturn(false);

        self::assertTrue($this->fizzBuzzService->isFizzOnly($toCompareMock));
    }

    public function testIsBuzzOnlyShallReturnTrue(): void
    {
        $toCompareMock = $this->createMock(IntegerInterface::class);
        $toCompareMock->expects(self::at(0))->method('isMultipleOf')->willReturn(true);
        $toCompareMock->expects(self::at(1))->method('isMultipleOf')->willReturn(false);

        self::assertTrue($this->fizzBuzzService->isBuzzOnly($toCompareMock));
    }

    public function testIsFizzBuzzShallReturnTrue(): void
    {
        $toCompareMock = $this->createMock(IntegerInterface::class);
        $toCompareMock->expects(self::at(0))->method('isMultipleOf')->willReturn(true);
        $toCompareMock->expects(self::at(1))->method('isMultipleOf')->willReturn(true);

        self::assertTrue($this->fizzBuzzService->isFizzBuzz($toCompareMock));
    }

}
