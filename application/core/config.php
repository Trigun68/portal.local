<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 23:02
 */
abstract class Config
{

    // Настройки портала
    const SALT_LEGHT = 10;
    const ADDRESS = "portal.local";

    // Константы базы данных
    const DB_HOST = "localhost";
    const DB_USER = "portal_user";
    const DB_PASSWORD = "password";
    const DB_NAME = "portal_db";
    const DB_TABLE_PREFIX = "abc_";

    // Константы форматов
    const FORMAT_DATE = "%d.%m.%Y %H:%M:%S";

    // Роль, контроллер и метод по умолчанию
    const DEFAULT_ROLE = "User";
    const DEFAULT_CONTROLLER = "Main";
    const DEFAULT_ACTION = "Index";



}
