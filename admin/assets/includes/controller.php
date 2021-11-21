<?php

ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set("error_reporting", E_ALL);

date_default_timezone_set('Europe/London');
 	
require 'constants.php';

require 'autoload.php';

$db = new Database();

$session = new Session($db);
$configs = new Configs($db);
$functions = new Functions($db);
$logger = new Logger($db);
$adminfunctions = new Adminfunctions($db, $functions, $configs, $logger);