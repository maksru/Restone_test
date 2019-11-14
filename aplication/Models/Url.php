<?php

namespace aplication\Models;
use core\Database;

class Url
{
    /**
     * Вывод всех ресторанов.
     */
    public static function allFind() {
        $db = new Database();
        $db = $db->getDb();
        $sql = "SELECT * FROM restoran";
        $sth = $db->prepare($sql);
        $sth->execute();
        $allRestoran = $sth->fetchAll();
        return $allRestoran;
    }

    /**
     * Добавление в базу данных.
     */
    public static function insert($first_name, $last_name, $emails_value, $type) {
//        echo '<pre>';
//            var_dump($first_name);
//            var_dump($last_name);
//            var_dump($emails_value);
//            var_dump($type);
//        die;


        $db = new Database();
        $db = $db->getDb();
        $sql = "INSERT INTO restoran (`first_name`, `last_name`, `emails_value`, `type`) VALUES ('$first_name', '$last_name', '$emails_value', '$type')";
        $sth = $db->prepare($sql);
        $sth->execute();
    }

    /**
     * Удаление поля.
     */
    public static function delete(int $id) {
        $db = new Database();
        $db = $db->getDb();
        $sql = "DELETE FROM `restoran` WHERE `id` = '$id' ";
        $sth = $db->prepare($sql);
        $sth->execute();
    }
}