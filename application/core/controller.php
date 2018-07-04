<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 23:11
 */
class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }
}