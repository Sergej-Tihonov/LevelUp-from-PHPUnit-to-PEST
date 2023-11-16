<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\Guard;
use App\Services\IntGuard;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AbstractGuardTest extends TestCase
{
    /** @test */
    public function getName_when_callerIsProvided_then_showRealVariable(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$variable cannot be null.');

        $variable = null;
        Guard::argument($variable)->notNull();
    }

    /** @test */
    public function getName_when_callerIsMissing_then_showPlaceholder(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument must be 0. Actual: '42'.");

        $variable = 42;
        (new IntGuard($variable, true, []))->zero();
    }

    /** @test */
    public function getType_when_simpleTypeProvided_then_returnSimpleType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$value must be int. Actual: string.');

        $value = 'value';
        Guard::argument($value)->isInt();
    }
}
