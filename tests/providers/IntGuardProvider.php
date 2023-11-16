<?php

namespace Tests\providers;

class IntGuardProvider
{
    public static int $DEFAULT_VALUE = 10;
    public static int $BETWEEN_MIN_VALUE = -10;
    public static int $BETWEEN_MAX_VALUE = 42;
    public static array $ALLOWED_VALUE = [-5, 0, 5];
    public static array $FORBIDDEN_VALUE = [-10, 1, 10];

    public static function positiveProvider(): array
    {
        return [
            'int 1' => [1],
            'int 42' => [42],
            'int max' => [PHP_INT_MAX],
        ];
    }

    public static function zeroProvider(): array
    {
        return [
            'int 0' => [0],
        ];
    }

    public static function negativeProvider(): array
    {
        return [
            'int -1' => [-1],
            'int -42' => [-42],
            'int min' => [PHP_INT_MIN],
        ];
    }
}
