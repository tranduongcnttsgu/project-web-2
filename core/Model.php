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
            $sql = "SELECT  DISTINCT * FROM $table";
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
            $sql = "SELECT  DISTINCT * FROM $table WHERE $attribute=$id";
            $stmt = $conn->query($sql);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:getAll function| messge:" . $e->getMessage();
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }

    /*
     attibute => ten column 
    */
    public function get($table, $conditions, $values, $limit = 1)
    {
        try {
            $conn = $this->db->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Xây dựng điều kiện từ mảng conditions
            $conditionStr = implode(' AND ', $conditions);
            $sql = "SELECT  DISTINCT * FROM $table WHERE $conditionStr  LIMIT $limit";
            $stmt = $conn->prepare($sql);

            $stmt->execute($values);

            return $stmt->fetch(PDO::FETCH_ASSOC) ?? false; // Trả về tất cả các hàng kết quả dưới dạng mảng kết hợp
        } catch (PDOException $e) {
            $error = date('Y/m/d H:i:s') . " index:get function| message:" . $e->getMessage();
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return false; // Trả về null nếu có lỗi
        }
    }
    /*
   $table = "your_table_name";
$conditions = array("column1 = ?", "column2 > ?", "column3 LIKE ?");
$values = array("value1", 10, "%search%");
$result = $yourObject->get($table, $conditions, $values);

  */
    public function findAll($table, $conditions = [], $values = [], $orderBY = false)
    {
        try {
            $conn = $this->db->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Xây dựng điều kiện từ mảng conditions
            $conditionStr = implode(' AND ', $conditions);
            $sql = "SELECT   DISTINCT * FROM $table WHERE $conditionStr   ";
            if ($orderBY) {
                $sql .= " ORDER BY $orderBY ";
            }
            $stmt = $conn->prepare($sql);

            $stmt->execute($values);

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? false; // Trả về tất cả các hàng kết quả dưới dạng mảng kết hợp
        } catch (PDOException $e) {
            $error = date('Y/m/d H:i:s') . " index:get function| message:" . $e->getMessage();
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return false; // Trả về null nếu có lỗi
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
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return null;
        }
    }
    /* 
$table = "your_table_name";

$columns = array("column1", "column2", ...);
// Các cột 

$values = array("new_value1", "new_value2", ...); 
// Các giá trị 





$result = $yourObject->insert($table, $columns, $values);
    */
    public function delete($table, $conditions = [], $values = [])
    {
        try {
            $conn = $this->db->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Xây dựng điều kiện từ mảng conditions
            $conditionStr = implode(' AND ', $conditions);
            $sql = "DELETE FROM $table WHERE $conditionStr ";
            $stmt = $conn->prepare($sql);

            $stmt->execute($values);


            return $stmt->rowCount();
        } catch (PDOException $e) {
            $error = date('Y/m/d H:i:s') . " index:delete function| message:" . $e->getMessage();
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return false;
        }
    }
    /* use function delete ==================================================
    $table = "your_table_name";

   $condition =[ "your_condition = ?"," "your_condition like ?"]; 

    // Điều kiện để xác định hàng cần xóa

    $values = array( ?--->"value1", "value2", ...); 

    // Giá trị cho các tham số trong điều kiện

     $result = $yourObject->delete($table, $condition, $values);

     //  result == id vủa bảng vừa delete

     => false =>> lỗi 
    */
    public function update($table, $columns = [], $values = [], $conditions = [], $conditionsValues = [])
    {
        try {
            $conn = $this->db->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Xây dựng phần SET của câu truy vấn
            $setClause = '';
            foreach ($columns as $column) {
                $setClause .= "$column = ?, ";
            }
            $setClause = rtrim($setClause, ', ');

            // Xây dựng phần điều kiện WHERE của câu truy vấn
            $conditionStr = '';
            foreach ($conditions as $condition) {
                $conditionStr .= "$condition AND ";
            }
            $conditionStr = rtrim($conditionStr, ' AND ');

            $sql = "UPDATE $table SET $setClause WHERE $conditionStr";
            $stmt = $conn->prepare($sql);

            // Ghép các mảng giá trị vào một mảng duy nhất
            $mergedValues = array_merge($values, $conditionsValues);

            $stmt->execute($mergedValues);

            return $stmt->rowCount(); // Trả về số hàng đã được cập nhật
        } catch (PDOException $e) {
            $error = date('Y/m/d H:i:s') . " index:update function| message:" . $e->getMessage();
            $file = fopen(Application::$ROOTDIR . "/runtime/PDOErrors.txt", "a");
            fwrite($file, $error . PHP_EOL);
            fclose($file);

            echo "ERROR! There was an issue with PDO: " . $e->getMessage();
            return false; // Trả về 0 nếu có lỗi
        }
    }

    /* 
$table = "your_table_name";
$columns = array("column1", "column2", "column3");
$values = array("value1", "value2", "value3");
$conditions = array("condition1 = ?", "condition2 > ?");
$conditionsValues = array("valueForCondition1", "valueForCondition2");

$result = $yourObject->update($table, $columns, $values, $conditions, $conditionsValues);

 your_table_name là tên bảng bạn muốn cập nhật.
column1, column2, column3 là các cột bạn muốn cập nhật.
value1, value2, value3 là các giá trị tương ứng bạn muốn cập nhật.
condition1 = ?, condition2 > ? là các điều kiện bạn muốn áp dụng.
valueForCondition1, valueForCondition2 là các giá trị tương ứng cho các điều kiện.

    */
    function autoId()
    {
        $timestamp = time();
        $id = date('YmdHis', $timestamp); // Năm + tháng + ngày + giờ + phút + giây
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 10;
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $id .= $characters[mt_rand(0, $max)];
        }

        return $id;
    }
}
