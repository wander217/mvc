<?php

define('WEBROOT', str_replace('public/index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('public/index.php', "", $_SERVER['SCRIPT_FILENAME'] . 'src/'));
define('BASE_PATH', str_replace('public/index.php', "", $_SERVER['SCRIPT_FILENAME']));

require BASE_PATH . '/vendor/autoload.php';

use MVC\Dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();
