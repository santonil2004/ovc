<?php

defined('DEBUG') or define('DEBUG', true);
defined('ENV') or define('ENV', 'dev');


/**
 * Load framework
 */
require(__DIR__ . '/../vendor/Core/autoload.php');

/**
 * include application configuration
 */
require(__DIR__ . '/config/config.php');

$Application = new Application();
$Application->run(__DIR__);