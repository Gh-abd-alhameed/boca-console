<?php

require __DIR__ . "/core/settings/Run.php";
require __DIR__ . "/core/settings/Create.php";
require __DIR__ . "/core/Console.php";

use boca\console\core\Console;

$Command = new Console();

//$Command->Init($argc, $argv);

$Command->Command("php init.php run");

//$Command->excute();