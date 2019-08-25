<?php

declare(strict_types=1);

namespace TimeTracker;

class Window
{
    private $name;
    private $seconds = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function secondIncrease()
    {
        $this->seconds++;
    }

    public function activityHours(): float
    {
        return ($this->seconds / 60) / 60;
    }

    public function activitySeconds(): float
    {
        return $this->seconds;
    }
}
