<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 10.01.2018
 * Time: 23:09
 */
class Authentification_model extends Model {

    protected static $db;
    private static $table = "abc_user";

    public function __construct()
    {
        self::$db = parent::$db;
    }

    public function get_data()
    {
    }

    public function check_data($id)
    {
        if (!empty($id)) {
        //* получаем данные из БД для верификации пользователя
        return self::$db->getRow("SELECT id, hash, ip FROM ?n WHERE id = ?i;", self::$table, $id);
        } else return false;
    }

    /**
    public function check_user($username)
    {
        return $this->db::getRow("SELECT id, password, salt FROM ?s WHERE user_name = ?s;", self::$table, $username);
    }

    public function set_field($field_name, $data, $where_field, $where_data)
    {
        $sql  = "UPDATE ?s SET ?s = ?s WHERE ?p;";
        self::$db.query($sql, self::$table, $field_name, $data, self::$db->parse($where_field, $where_data));
    }

    public function set_row($row_name, $data)
    {
        $sql  = "INSERT INTO ?s (?s) VALUES ?s;";
        self::$db.query($sql, self::$table, $row_name, $data);
    }
     */
}