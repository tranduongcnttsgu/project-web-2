<?php

namespace models;

use core\Model;
use PDOException;
use PDO;

class UserModel extends Model
{



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
    public function updateInfo($value, $userId)
    {
        return $this->update("users", ["name", "address", "email", "nickname", "phone"], $value, ["user_id=?"], [$userId]);
    }
    public function userOrder($userId)
    {
        $orders = $this->get("orders", ["customer_id=?", "status=?"], [$userId, 1]);
        $orderDetail = $this->findAll("orders_detail", ["order_id=?"], [$orders["order_id"]]);
        foreach ($orderDetail as $key => $value) {
            $this->delete("cart", ["product_id=?", "user_id=?"], [$value["product_id"], $userId]);
        }

        return $this->update("orders", ["status"], [2], ["customer_id=?", "status=?"], [$userId, 1]);
    }
    public function getUserOrder($userId)
    {
        $orders = $this->findAll("orders", ["customer_id=?", "status=?"], [$userId, 2], "update_at DESC");
        $result = [];
        foreach ($orders as $key => $value) {
            $orderDetail = $this->findAll('orders_detail', ["order_id=?"], [$value["order_id"]], " update_at DESC");
            array_push($result, ["order" => $value, "orderDetail" => $orderDetail]);
        }
        return $result;
    }
}
