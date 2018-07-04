<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.01.2018
 * Time: 21:26
 */
class User_Main extends Controller {

    public function Action_Index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }


    public function Action_Authentification()
    {
    echo 'Входите';
    }

}