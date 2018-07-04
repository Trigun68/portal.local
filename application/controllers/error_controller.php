<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 06.06.2018
 * Time: 22:28
 */

class Error_Controller
{
    public function Action_403($error_message)
    {
        echo $error_message;
    }

    public function Action_404($error_message)
    {
        echo $error_message;
    }
}