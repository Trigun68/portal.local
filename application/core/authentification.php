<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 15.01.2018
 * Time: 20:48
 */

class Authentification {

    private static $auth;

    public function __construct()
    {
        session_start();
        self::$auth = new Authentification_model();
    }

    public function Check() {
        if (isset($_COOKIE['id'])) $userdata = self::$auth->check_data($_COOKIE['id']);
        $ip = $this->getIP();

        if (isset($_COOKIE['id']) and isset($_COOKIE['hash']) and ($userdata['hash'] == $_COOKIE['hash']) and ($userdata['hash'] !== "") and ($userdata['id'] == $_COOKIE['id']) and ($userdata['ip'] == $ip) and ($userdata['ip'] !== "0")) {
            setcookie('id', $_COOKIE['id'], time() + 60 * 60 * 24 * 7, '/');
            setcookie("hash", $_COOKIE['hash'], time() + 60 * 60 * 24 * 7, "/");
            return $_COOKIE['id'];
        } else {
            setcookie('id', '', time() - 10000, '/');
            setcookie('hash', '', time() - 10000, '/');
            return 0;
        }
    }

    /**
    public static function Login($username, $password, $remindme = false)
    {
        //* Проверяем существование пользователя при входе
        $userdata = self::$auth.check_user($username);
        if (isset($userdata) and !empty($userdata))
        {
            if ($userdata(password) == md5($userdata(salt).md5($password).$userdata(salt)))
            {
                setcookie('id', $userdata(id), time() + 60 * 60 * 24 * 7, '/');

                $hash = generate_hash(20);
                self::$auth.set_field('hash', $hash, 'id = ?i', $userdata(id));
                setcookie("hash", $_COOKIE['hash'], time() + 60 * 60 * 24 * 7, "/");

                $ip = self::getIP();
                self::$auth.set_field('ip', $ip, 'id = ?i', $userdata(id));

                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }


    public static function Registration($username, $password, $email) {
        // проверяем уникальность пользователя

        // добавляем пользователя и его реквизиты

        // ставим куки
    }

    public static function Logout() {
        //Если переменная auth из сессии не пуста и равна true, то...
        if (!empty($_SESSION['id']) and ($_SESSION['id'] !== '')) {

            // Делаем запись в базу
            self::$auth.set_field('hash', '', 'id = ?i', $_SESSION['id']);

            //разрушаем сессию для пользователя
            session_destroy();

            //Удаляем куки авторизации путем установления времени их жизни на текущий момент:
            setcookie('id', '', time()); //удаляем логин
            setcookie('hash', '', time()); //удаляем хеш
        }
    }

    private function generateSalt()
    {
        $salt = '';
        $saltLength = config::SALT_LEGHT; //длина соли
        for($i=0; $i<$saltLength; $i++) {
            $salt .= chr(mt_rand(33,126)); //символ из ASCII-table
        }
        return $salt;
    }



    function generate_hash($length=6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }
    */
    private function getIP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
