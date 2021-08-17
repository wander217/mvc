<?php

namespace MVC\Config;

use PDO;

class Database
{
    private static $connection = null;
    private static $username = 'root';
    private static $password = 'Thinh2171999';
    private static $url = 'mysql:host=localhost;dbname=mvc';

    public static function getConnection()
    {
        if (is_null(self::$connection)) {
            self::$connection = new PDO(self::$url, self::$username, self::$password);
        }
        return self::$connection;
    }
}