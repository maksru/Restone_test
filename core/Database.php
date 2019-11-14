<?php
namespace core;
class Database
{
    private $db;
    public function __construct() {
        $paramsPath = ROOT . '/config/database.php';
        $params = include($paramsPath);
        $this->db = new \PDO('mysql:host=' . $params['host'], $params['user'], $params['password']);
        $sql = "CREATE DATABASE IF NOT EXISTS ". $params["dbname"];
        $this->db->exec($sql);
        $sql = NULL;
        $this->db = new \PDO('mysql:host=' . $params['host'] . ';dbname=' . $params["dbname"], $params['user'], $params['password']);
        $this->db->exec("set names utf8");
        $sql = "CREATE TABLE IF NOT EXISTS `restoran` ( `id` INT AUTO_INCREMENT, `first_name` CHAR(255), `last_name` CHAR(255), `emails_value` CHAR(255), `type` text, PRIMARY KEY(`id`), UNIQUE(`id`) )";
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }
    public function getDb() {
        return $this->db;
    }
}