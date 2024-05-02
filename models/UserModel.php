<?php

namespace models;

use core\Model;
use dto\Permission;
use dto\Services;
use dto\User;
use dto\UserPermission;
use PDOException;
use PDO;

use function PHPSTORM_META\type;

class UserModel extends Model
{



    public function getUserByEmail($email)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * from users,users_permission where 
               users.email = ? and users_permission.user_id = users.user_id
            ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $email, PDO::PARAM_STR);
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
    public function adminGetAccount()
    {
        $result = [];
        $users = $this->getAll("users");
        $user_roles = [];
        foreach ($users as $key => $value) {
            $roles = $this->findAll("users_permission", ["user_id=?", "action_group=?"], [$value["user_id"], 1]);
            if ($roles === false || sizeof($roles) == 0) {
                continue;
            } else {
                array_push($user_roles, ["user" => $value, "roles" => $roles]);
            }
        }
        $account = [];
        foreach ($user_roles as $key => $value) {
            $roles = $value["roles"];
            $role_permision = [];
            foreach ($roles as $key => $data) {
                $role = $this->findAll("permission", ["user_permission_id=?"], [$data["user_permission_id"]]);
                $role_permision = $role;
            }

            array_push($account, ["user" => $value["user"], "roles" => $role_permision]);
        }

        foreach ($account as $key => $value) {

            $roles = $value["roles"];
            $permissions = [];
            foreach ($roles as $key => $data) {
                $permisson = $this->get("services", ["permission_id=?"], [$data["permission_id"]]);
                array_push($permissions, ["role" => $data, "permission" => $permisson]);
            }
            array_push($result, ["user" => $value["user"], "roles" => $permissions]);
        }

        return $result;
    }
    public  function getPermission($userId)
    {
        $user_role = $this->get("users_permission", ["user_id=?"], [$userId]);
        $result = [];
        $permissions = $this->findAll("permission", ["user_permission_id=?"], [$user_role["user_permission_id"]]);
        foreach ($permissions as $key => $value) {
            $service = $this->get("services", ["permission_id=?"], [$value["permission_id"]]);
            array_push($result, ["role" => $value, "permission" => $service]);
        }

        return $result;
    }
    public function adminAddnewAccount(User $user, UserPermission $user_permission, $roles = [])
    {

        $createUser = $this->insert("users", "user_id, name, password, email, address, phone", [
            $user->getUser_id(), $user->getName(), $user->getPassword(), $user->getEmail(), $user->getAddress(), $user->getPhone()
        ]);

        if ($createUser === false) {
            return false;
        }


        $createUserPermission =  $this->insert("users_permission", "user_permission_id, user_id, action_group", [$user_permission->getUser_permission_id(), $user_permission->getUser_id(), "1"]);


        foreach ($roles as $key => $value) {

            $permission = new Permission();
            $services = new Services();
            $permission->setUser_permission_id(
                $user_permission->getUser_permission_id()

            );
            $permission->setPermission_id($this->autoId());
            $permission->setAction($value["name"]);
            $services->setPermission_id($permission->getPermission_id());
            $services->setView($value["view"]);
            $services->setAction_update($value["action_update"]);
            $services->setAction_delete($value["action_delete"]);
            $services->setAction_create($value["action_add"]);

            $createPermission = $this->insert("permission", "permission_id,service, user_permission_id", [$permission->getPermission_id(), $permission->getAction(), $permission->getUser_permission_id()]);
            $createService = $this->insert("services", "permission_id, view, action_delete, action_update, action_create", [$services->getPermission_id(), $services->getView(), $services->getAction_delete(), $services->getAction_update(), $services->getAction_create()]);
            if ($createPermission === false) {
                return false;
            }
            if ($createService === false) {
                return $createService;
            }
        }
        return true;
    }
    public function  adminDeleteAccount($userId)
    {
        $user_permission = $this->get("users_permission", ["user_id=?"], [$userId]);
        $permissions = $this->findAll("permission", ["user_permission_id=?"], [$user_permission["user_permission_id"]]);
        foreach ($permissions as $key => $value) {
            $delete =    $this->delete("services", ["permission_id=?"], [$value["permission_id"]]);
            if ($delete === false) {
                return $delete;
            }
        }
        $delete =   $this->delete("permission", ["user_permission_id=?"], [$user_permission["user_permission_id"]]);
        $this->delete("users_permission", ["user_id=?"], [$userId]);
        $this->delete("users", ["user_id=?"], [$userId]);
        if ($delete === false) {
            return $delete;
        }
        return true;
    }
    public function adminEditGetAccount($userId)
    {
        $result = [];
        $user = $this->get("users", ["user_id=?"], [$userId]);
        $user_permission = $this->get("users_permission", ["user_id=?"], [$userId]);
        $permissions = $this->findAll("permission", ["user_permission_id=?"], [$user_permission["user_permission_id"]]);
        $listPermission = [];
        foreach ($permissions as $key => $value) {
            $services = $this->get("services", ["permission_id=?"], [$value["permission_id"]]);
            array_push($listPermission, ["permission" => $value, "service" => $services]);
        }
        array_push($result, ["user" => $user, "roles" => $listPermission]);
        return $result;
    }
    public function adminEditAccount(User $user, UserPermission $user_permission, $roles = [])
    {
        $updateUser =  $this->update("users", ["name", "password", "email", "address", "phone"], [$user->getName(), $user->getPassword(), $user->getEmail(), $user->getAddress(), $user->getPhone()], ["user_id=?"], [$user->getUser_id()]);
        if ($updateUser === false) {
            return $updateUser;
        }
        $user_role = $this->get("users_permission", ["user_id=?"], [$user_permission->getUser_id()]);
        $user_permission->setUser_permission_id($user_role["user_permission_id"]);

        $permissions = $this->findAll("permission", ["user_permission_id=?"], [$user_role["user_permission_id"]]);
        foreach ($permissions as $key => $value) {
            $delete =    $this->delete("services", ["permission_id=?"], [$value["permission_id"]]);
            if ($delete === false) {
                return $delete;
            }
        }
        $delete =   $this->delete("permission", ["user_permission_id=?"], [$user_permission->getUser_permission_id()]);
        foreach ($roles as $key => $value) {

            $permission = new Permission();
            $services = new Services();
            $permission->setUser_permission_id(
                $user_permission->getUser_permission_id()

            );
            $permission->setPermission_id($this->autoId());
            $permission->setAction($value["name"]);
            $services->setPermission_id($permission->getPermission_id());
            $services->setView($value["view"]);
            $services->setAction_update($value["action_update"]);
            $services->setAction_delete($value["action_delete"]);
            $services->setAction_create($value["action_add"]);

            $createPermission = $this->insert("permission", "permission_id,service, user_permission_id", [$permission->getPermission_id(), $permission->getAction(), $permission->getUser_permission_id()]);
            $createService = $this->insert("services", "permission_id, view, action_delete, action_update, action_create", [$services->getPermission_id(), $services->getView(), $services->getAction_delete(), $services->getAction_update(), $services->getAction_create()]);
            if ($createPermission === false) {
                return false;
            }
            if ($createService === false) {
                return $createService;
            }
        }
        return true;
    }
    public function adminCheckPermision($userId)
    {
        $result = [];
        $user_role = $this->get("users_permission", ["user_id=?"], [$userId]);
        $permissions = $this->findAll("permission", ["user_permission_id=?"], [$user_role["user_permission_id"]]);

        foreach ($permissions as $key => $value) {
            $service = $this->get("services", ["permission_id=?"], [$value["permission_id"]]);
            array_push($result, ["permission" => $value, "service" => $service]);
        }
        return $result;
    }
}
