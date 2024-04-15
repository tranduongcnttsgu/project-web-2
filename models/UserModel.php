<?php

namespace models;

use core\Model;
use PDOException;
use PDO;

class UserModel extends Model
{
    public function update()
    {
    }

    public function delete($table, $where)
    {
    }
    public function getUserByEmail($email)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * from users,users_permission WHERE users.user_id=users_permission.user_permission_id AND users.email=:email ";


            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:usermodel function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getUserById($id)
    {
        try {

            $result = [];
            $conn = $this->db->connect();

            $sql = "SELECT * FROM `users` WHERE users.user_id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? false;
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:usermodel function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
}
