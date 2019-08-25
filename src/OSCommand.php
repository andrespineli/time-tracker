<?php

declare(strict_types=1);

namespace TimeTracker;

interface OSCommand
{
    public function exec(): string;
}
