<?php

namespace core;

use PDO;
use PDOException;
use core\Database;


abstract  class Model
{
    public Database $db;
    public function __construct()
    {
        $this->db = Application::$app->database;
    }
    public function getAll($table)
    {
        try {
            $result = null;
            $conn = $this->db->connect();
            $sql = "SELECT * FROM $table";
            $stmt  = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // ->  return  array value
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $result;
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:getAll function| messge:" . $e->getMessage();
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getById(string $id, $attribute, $table)
    {
        try {
            $result = null;
            $conn = $this->db->connect();
            $sql = "SELECT * FROM $table WHERE $attribute=$id";
            $stmt = $conn->query($sql);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:getAll function| messge:" . $e->getMessage();
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function insert($table, $columns, $values)
    {
        try {
            $conn = $this->db->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $placeholders = implode(',', array_fill(0, count($values), '?'));


            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $conn->prepare($sql);


            $stmt->execute($values);


            return $conn->lastInsertId();
        } catch (PDOException $e) {
            $error = date('Y/m/d H:i:s') . " index:insert function| message:" . $e->getMessage();
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return null;
        }
    }
    public abstract function delete($table, $where);
    public abstract function update();
}
