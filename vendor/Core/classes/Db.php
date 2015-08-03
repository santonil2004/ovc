<?php

/**
 * Database 
 * @package core
 * @author Sanil Shrestha <web.developer.sanil@gmail.com>
 */
class Db {

    public static function connect() {
        R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    }

    public static function disconnect() {
        R::close();
    }

}
