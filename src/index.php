<?php

session_start();

define('WEBROOT', dirname(__FILE__));
define('SITE_ROOT', realpath(dirname(__FILE__)));
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT . DS . 'core');
define('HOST', "http://$_SERVER[HTTP_HOST]");
define('URL', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

require SITE_ROOT . "/core/resources/Autoloader.php";

Core\Resources\Autoloader::register();

use Core\Resources\Launcher;

//Initialize & launch app
Launcher::start();
