<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 21:50
 */
    mb_internal_encoding("UTF-8");
    error_reporting(E_ALL);

    set_include_path(get_include_path().PATH_SEPARATOR."application/core".PATH_SEPARATOR."application/controllers".PATH_SEPARATOR."application/models".PATH_SEPARATOR."application/template".PATH_SEPARATOR."application/views");
    spl_autoload_extensions(".php");
    spl_autoload_register();

    Route::start();


