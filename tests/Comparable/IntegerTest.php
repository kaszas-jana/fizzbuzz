<?php
declare(strict_types = 1);

namespace App\Tests\Comparable;

use App\Comparable\Integer;
use App\Comparable\IntegerInterface;
use App\Exception\ModuloByZeroException;
use PHPUnit\Framework\TestCase;

/**
 * Class IntegerTest
 */
class IntegerTest extends TestCase
{
    /** @var IntegerTest */
    private $integerObject;

    public function setUp(): void
    {
        $this->integerObject = new Integer(42);
    }

    public function testGetIntegerValueShallReturnFourtyTwo(): void
    {
        self::assertEquals(42, $this->integerObject->getIntegerValue());
    }

    public function testIsMultipleOfShallReturnTrue(): void
    {
        $integerMock = $this->createMock(IntegerInterface::class);
        $integerMock->method('getIntegerValue')->willReturn(21);

        self::assertTrue($this->integerObject->isMultipleOf($integerMock));
    }

    public function testIsMultipleOfShallReturnFalse(): void
    {
        $integerMock = $this->createMock(IntegerInterface::class);
        $integerMock->method('getIntegerValue')->willReturn(29);

        self::assertFalse($this->integerObject->isMultipleOf($integerMock));
    }

    public function testIsMultipleOfShallThrowException(): void
    {
        $integerMock = $this->createMock(IntegerInterface::class);
        $integerMock->method('getIntegerValue')->willReturn(0);

        $this->expectException(ModuloByZeroException::class);
        self::assertFalse($this->integerObject->isMultipleOf($integerMock));
    }
}
