<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 23:08
 */
class Route
{
    public static function start()
    {
        $rca_names = URL::getURL();
        $authentification = new Authentification();
        $rac = new RightAccess();
        $controller_name = $rca_names[0]."_".$rca_names[1];
        $action_name = "Action_".$rca_names[2];

        try {
            if ($authentification->Check() == 0) {
                $controller_name = config::DEFAULT_ROLE."_".config::DEFAULT_CONTROLLER;
                $action_name = "Action_Authentification";
                $controller = new $controller_name;
                $controller->$action_name();
            }
            else {
                $right_access = $rac::getRight($authentification->check());


                if (!empty($right_access[$controller_name."_".$action_name]))
                {
                    if (class_exists($controller_name)) {
                        $controller = new $controller_name;
                        if (method_exists($controller, $action_name)) $controller->$action_name();
                        else throw new Exception("Запрашиваемая страница не найдена", 404);
                    }
                    else throw new Exception("Запрашиваемая страница не найдена", 404);
                }
                else throw new Exception("Доступ закрыт", 403);
            }
        } catch (Exception $e) {
            $controller = new Error_Controller;
            $action_name = "Action_".$e->getCode();
            if (method_exists($controller, $action_name)) $controller->$action_name($e->getMessage());
            else $controller->Action_404($e->getMessage());
        }
    }
}