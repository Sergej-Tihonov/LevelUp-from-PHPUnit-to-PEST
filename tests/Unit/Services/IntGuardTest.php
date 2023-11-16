<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\Guard;
use App\Services\IntGuard;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Tests\providers\IntGuardProvider;

class IntGuardTest extends TestCase
{
    /** @test */
    public function construct_when_valueIsNullAndIsRequired_then_throwException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Value must be optional to be null.');

        new IntGuard(null, false, []);
    }

    /** @test */
    public function construct_when_valueIsNull_then_succeed(): void
    {
        $result = new IntGuard(null, true, []);

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test */
    public function construct_when_valueIsInt_then_succeed(): void
    {
        $value = IntGuardProvider::$DEFAULT_VALUE;
        $result = new IntGuard($value, true, []);

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test */
    public function zero_when_valueIsOptional_then_succeed(): void
    {
        $result = Guard::argument(null)->isInt()->zero();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::zeroProvider()
     */
    public function zero_when_valueIsZero_then_succeed(int $value): void
    {
        $result = Guard::argument($value)->isInt()->zero();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::positiveProvider()
     * @dataProvider \Tests\providers\IntGuardProvider::negativeProvider()
     */
    public function zero_when_valueIsNotZero_then_throwException(int $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("\$value must be 0. Actual: '{$value}'.");

        Guard::argument($value)->isInt()->zero();
    }

    /** @test */
    public function notZero_when_valueIsOptional_then_succeed(): void
    {
        $result = Guard::argument(null)->isInt()->notZero();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::positiveProvider()
     * @dataProvider \Tests\providers\IntGuardProvider::negativeProvider()
     */
    public function notZero_when_valueIsNotZero_then_succeed(int $value): void
    {
        $result = Guard::argument($value)->isInt()->notZero();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::zeroProvider()
     */
    public function notZero_when_valueIsZero_then_throwException(int $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("\$value cannot be 0. Actual: '{$value}'.");

        Guard::argument($value)->isInt()->notZero();
    }

    /** @test */
    public function positive_when_valueIsOptional_then_succeed(): void
    {
        $result = Guard::argument(null)->isInt()->positive();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::positiveProvider()
     */
    public function positive_when_valueIsPositive_then_succeed(int $value): void
    {
        $result = Guard::argument($value)->isInt()->positive();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::zeroProvider()
     * @dataProvider \Tests\providers\IntGuardProvider::negativeProvider()
     */
    public function positive_when_valueIsNegativeOrZero_then_throwException(int $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("\$value must be positive and bigger then 0. Actual: '{$value}'.");

        Guard::argument($value)->isInt()->positive();
    }

    /** @test */
    public function negative_when_valueIsOptional_then_succeed(): void
    {
        $result = Guard::argument(null)->isInt()->negative();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::negativeProvider()
     */
    public function negative_when_valueIsNegative_then_succeed(int $value): void
    {
        $result = Guard::argument($value)->isInt()->negative();

        $this->assertTrue($result instanceof IntGuard);
    }

    /** @test
     * @dataProvider \Tests\providers\IntGuardProvider::positiveProvider()
     * @dataProvider \Tests\providers\IntGuardProvider::zeroProvider()
     */
    public function negative_when_valueIsPositiveOrZero_then_throwException(int $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("\$value must be negative and smaller then 0. Actual: '{$value}'.");

        Guard::argument($value)->isInt()->negative();
    }
}
