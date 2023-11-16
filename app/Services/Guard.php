<?php

declare(strict_types=1);

namespace App\Services;

use InvalidArgumentException;

class Guard extends AbstractGuard
{
    private function __construct(mixed $value, array $caller)
    {
        parent::__construct($value, true, $caller);
    }

    public static function argument(mixed $value): Guard
    {
        $caller = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];

        return new Guard($value, $caller);
    }

    public function null(): Guard
    {
        if ($this->noValue) {
            return $this;
        }

        throw new InvalidArgumentException("{$this->getName()} must be null.");
    }

    public function notNull(): Guard
    {
        if (isset($this->value)) {
            $this->optional = false;
            $this->noValue = false;

            return $this;
        }

        throw new InvalidArgumentException("{$this->getName()} cannot be null.");
    }

    public function isInt(): IntGuard
    {
        if ($this->optional && $this->noValue) {
            return new IntGuard(null, $this->optional, $this->caller);
        }
        if (is_int($this->value)) {
            return new IntGuard($this->value, $this->optional, $this->caller);
        }

        throw new InvalidArgumentException("{$this->getName()} must be int. Actual: {$this->getTypeDescription()}.");
    }
}
