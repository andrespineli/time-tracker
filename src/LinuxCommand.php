<?php

declare(strict_types=1);

namespace TimeTracker;

use TimeTracker\OSCommand;

class LinuxCommand implements OSCommand
{
    public function exec(): string
    {
        $command = shell_exec("xprop -id $(xprop -root _NET_ACTIVE_WINDOW | cut -d ' ' -f 5) WM_NAME | cut -d '' -f 2");
        preg_match('/"(.*?)"/', $command, $matches);
        return $matches[1];
    }

    public function getCurrentGitBranch()
    {
        return shell_exec("git branch | grep \* | cut -d ' ' -f2");
    }
}