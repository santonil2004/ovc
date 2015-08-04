<?php

/**
 * Autoload necessary classes
 * @package core
 * @author Sanil Shrestha<web.developer.sanil@gmail.com> 
 */
/**
 * Load all necessary core files
 */
require_once __DIR__ . '/core-config.php';


/**
 * load red beans ORM
 */
include VENDOR_BASE_PATH . DS . 'RedBean/rb.php';
//include VENDOR_BASE_PATH . DS . 'RedBean/RedBeanFVM.php';

/**
 * Include all php files from classes
 */
foreach (glob(__DIR__ . "/classes/*.php") as $filename) {
    include_once $filename;
}

/**
 * auto include the classes given on autoload path
 * @param type $className
 */
function loadAppClass($className) {
    global $autoLoadPath;
    foreach ($autoLoadPath as $path) {
        if (file_exists(APP_BASE_PATH . DS . $path . DS . $className . '.php')) {
            include_once APP_BASE_PATH . DS . $path . DS . $className . '.php';
            return;
        }
    }
}

spl_autoload_register('loadAppClass');


// connect database
if (defined(DB_HOST) && defined(DB_NAME) && defined(DB_USER) && defined(DB_PASSWORD)) {
    R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    //R::freeze(TRUE);
}



