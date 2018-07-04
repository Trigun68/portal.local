<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 23:09
 */
class Model
{
    protected static $db;

    protected function __construct() {
        if (self::$db == null) self::$db = new Connection_DB();
        return self::$db;
    }

    public function get_data()
    {
    }
}