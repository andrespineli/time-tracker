#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use TimeTracker\Config;
use TimeTracker\Windows;
use TimeTracker\LinuxCommand;

$windows = new Windows;

$today = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
$fileName = "{$today->format('Y-m-d H:i:s')}";

while (true) {
	$command = getOSCommand();
	$name = $command->exec();
	$keys = Config::keys();
	$branch = $command->getCurrentGitBranch();

	foreach ($keys as $key) {
		if (strpos($name, $key) != false || $name == $key) {
			$windows->registerActivity($key, $branch, $fileName);
		}
	}

	sleep(1);
}

function getOSCommand()
{
	switch (PHP_OS) {
		case 'Linux':
			return new LinuxCommand();
			break;

		default:
			die('OS not supported.');
			break;
	}
}
