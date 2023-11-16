<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\Guard;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GuardTest extends TestCase
{
    /** @test */
    public function argument_when_nullArgumentPassed_then_guardReturned(): void
    {
        $result = Guard::argument(null);

        $this->assertTrue($result instanceof Guard);
    }

    /** @test */
    public function argument_when_notNullArgumentPassed_then_guardReturned(): void
    {
        $result = Guard::argument(42);

        $this->assertTrue($result instanceof Guard);
    }

    /** @test */
    public function null_when_valueIsNull_then_succeed(): void
    {
        $result = Guard::argument(null)->null();

        $this->assertTrue($result instanceof Guard);
    }

    /** @test */
    public function null_when_valueIsNotNull_then_throwException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('42 must be null.');

        Guard::argument(42)->null();
    }

    /** @test */
    public function notNull_when_valueIsNotNull_then_succeed(): void
    {
        $result = Guard::argument(42)->notNull();

        $this->assertTrue($result instanceof Guard);
    }

    /** @test */
    public function notNull_when_valueIsNull_then_throwException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('null cannot be null.');

        Guard::argument(null)->notNull();
    }
}
