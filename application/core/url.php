<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 15.01.2018
 * Time: 20:38
 */
class URL {
    public static function getURL() {
        // формируем массив по умолчанию
        $url_arr = ['0'=>Config::DEFAULT_ROLE, '1'=> Config::DEFAULT_CONTROLLER, '2'=>Config::DEFAULT_ACTION];
        //получаем адрес страницы
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //проверяем существование адреса
        if ((!$uri) or ($uri == '/')) return $url_arr;
        //удаляем первый / в строке
        if (substr($uri,0,1) == '/') $uri = substr($uri,1, strlen($uri)- 1);
        //проверяем наличие одного уровня в адресе
        if (strpos($uri, '/') == false) {
            $url_arr['action'] = $uri;
            return $url_arr;
        } else{
            // разбиваем адрес на массив
            $temp_arr = explode('/', $uri);
            // если массив неверный и содекржит 4 элемента
            if (count($temp_arr)>3) {
                $url_arr['action'] = '404';
                return $url_arr;
            }
            // модифицируем массив по умолчанию
            $j = 2;
            for ($i = count($temp_arr)-1; $i>= 0; $i--) {
                $url_arr[$j] = $temp_arr[$i];
                $j--;
            }
        }
        return $url_arr;
    }

    public static function setURL() {

    }

    public static function get($role, $action, $controller = "", $data = array(), $amp = true, $address = "", $handler = true) {

    }


}