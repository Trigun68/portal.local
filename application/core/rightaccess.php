<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 19.05.2018
 * Time: 9:08
 */

class RightAccess
{

    public static function getRight($userid)
    {
        return array('user_main_Action_Index'=>$userid);
    }

}