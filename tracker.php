#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use TimeTracker\Config;
use TimeTracker\Windows;
use TimeTracker\LinuxCommand;

$windows = new Windows;

while (true) {
	$command = getOSCommand();
	$name = $command->exec();
	$keys = Config::keys();

	foreach ($keys as $key) {

		if (strpos($name, $key) != false) {
			$windows->registerActivity($key);
		}
	}

	sleep(1);
}

function getOSCommand() {
	switch (PHP_OS) {
		case 'Linux':
			return new LinuxCommand();
			break;
		
		default:
			die('OS not supported.');
			break;
	}
}
