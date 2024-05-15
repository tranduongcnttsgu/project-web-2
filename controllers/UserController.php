<?php

namespace controllers;

use core\Controller;
use dto\Permission;
use dto\Services;
use dto\User;
use dto\UserPermission;
use models\UserModel;

class UserController extends Controller
{
    private UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function getPermission($userId)
    {

        return $this->userModel->getPermission($userId);
    }
    public function login()
    {
        $payload = $this->getPayload();
        $email = $payload["email"] ?? "";
        $data = $this->userModel->getUserByEmail($email) ??  false;
        if (sizeof($data) === 0 || !$data) {
            return  json_encode(["message" => "user not exist!", "success" => false, "code" => 404]);
        }
        if (strcmp($data[0]["status"], "0") === 0) {
            return  json_encode(["message" => "block!", "success" => false, "code" => 403]);
        }
        $password =  $payload["password"];
        if (strcasecmp($password, $data[0]["password"]) === 0) {
            $this->cookiePush("userLogin", $data[0]["user_id"], 7, "/");

            $this->cookiePush("action_group", $data[0]["action_group"], 7, "/");
            if ($data[0]["action_group"] === 1) {
                $this->cookiePush("permission_id", $data[0]["user_permission_id"], 7, "/");
            }
            return json_encode(["message" => "login success", "success" => true, "code" => 200, "info" => ["userId" => $data[0]["user_id"], "action_group" => $data[0]["action_group"]]]);
        }
        return  json_encode(["message" => "password or   email invalid!", "success" => false, "code" => 200]);
    }
    public function logout()
    {
        $this->cookieDelete("userLogin");
        $this->cookieDelete("action_group");
        $this->cookieDelete("permission_id");
        return $this->responseJSON("logout success", true, 200);
    }
    public function getInfoLoginUser()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {
            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $payload = $this->getHeader("userLogin");

        $data = $this->userModel->getUserById($payload) ?? [];

        $data = array_diff_key($data[0], ["password" => "any"]);
        $type = $this->cookieGet("action_group");
        return $this->responseJSON("người dùng đã login", true, 200, ["data" => $data, "type" => $type]);
    }
    public function updateInfo()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {
            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $payload = $this->getPayload();
        $userId = $this->cookieGet("userLogin");
        $info = [$payload["fullName"], $payload["address"], $payload["emailInfo"], $payload["nickname"], $payload["phone"]];
        // ["name", "address", "email", "nickname", "phone"]
        $data = $this->userModel->updateInfo($info, $userId);
        return $this->responseJSON("success", true, 200, ["data" => $payload, "column" => $data]);
    }
    public function userOrder()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {
            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $userId = $this->cookieGet("userLogin");
        $data =  $this->userModel->userOrder($userId);
        return $this->responseJSON("đặt hàng thành công", true, 200, $data);
    }
    public function getUserOrder()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {
            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $userId  = $this->cookieGet("userLogin");
        $data = $this->userModel->getUserOrder($userId);
        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminGetAccount()
    {
        return $this->userModel->adminGetAccount();
    }
    public function adminAddnewAccount()
    {
        $payload = $this->getPayloadJson();
        $user = new User();
        $user_permission = new UserPermission();

        $user->setUser_id($this->userModel

            ->autoId());
        $user->setName($payload["account"]["fullName"]);
        $user->setEmail($payload["account"]["emailInfo"]);
        $user->setPassword($payload["account"]["password"]);
        $user->setPhone($payload["account"]["phone"]);
        $user->setAddress($payload["account"]["address"]);
        $user_permission->setUser_id($user->getUser_id());
        $user_permission->setPermissionId($this->userModel->autoId());
        $user_permission->setUser_permission_id($this->userModel->autoId());
        $roles = $payload["roles"];

        $res = $this->userModel->adminAddnewAccount($user, $user_permission, $roles);
        if ($res === false) {
            return $this->responseJSON("fail", false, 404, $payload);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
    public function adminDeleteAccount()
    {
        $payload = $this->getPayload();
        $userId = $payload["userId"];
        $req = $this->userModel->adminDeleteAccount($userId);
        if ($req === false) {
            return $this->responseJSON("xóa không thành công", false, 404, $payload);
        }
        return $this->responseJSON("xóa thành công", true, 200, $payload);
    }
    public function adminEditGetAccount()
    {
        $payload = $this->getPayload();
        $usrId = $payload["userId"];
        $data = $this->userModel->adminEditGetAccount($usrId);
        if (sizeof($data) === 0) {
            return $this->responseJSON("success", false, 200, $payload);
        }
        return $this->responseJSON("success", true, 200, $data[0]);
    }
    public function  adminEditAccount()
    {
        $payload = $this->getPayloadJson();
        $userid  = $payload["userId"];
        $roles = $payload["roles"];
        $user = new User();
        $user_permission = new UserPermission();
        $user->setUser_id($userid);
        $user->setName($payload["account"]["fullName"]);
        $user->setEmail($payload["account"]["emailInfo"]);
        $user->setPassword($payload["account"]["password"]);
        $user->setPhone($payload["account"]["phone"]);
        $user->setAddress($payload["account"]["address"]);
        $user_permission->setUser_id($user->getUser_id());
        $update = $this->userModel->adminEditAccount($user, $user_permission, $roles);
        if ($update === false) {
            return $this->responseJSON("fail", false, 400, $payload);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
    public function adminCheckPermision()
    {
        $userId = $this->cookieGet("userLogin");
        if (!isset($userId)) {
            return $this->responseJSON("fail", false, 404, $userId);
        }
        $permission = $this->userModel->adminCheckPermision($userId);
        if (sizeof($permission) === 0) {
            return $this->responseJSON("fail", false, 404, $userId);
        }
        return $this->responseJSON("success", true, 200, $permission);
    }
    public function register()
    {
        $payload = $this->getPayloadJson();
        $data    = $payload["info"];
        $user = new User();
        $user->setUser_id($this->userModel->autoId());
        $user->setEmail($data["email"]);
        $user->setName($data["name"]);
        $user->setPassword($data["password"]);
        $user->setStatus(1);
        $addUser = $this->userModel->register($user);
        if ($addUser === false) {
            return $this->responseJSON("email đã tồn tại ", false, 404, $data);
        }
        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminGetListCustomer()
    {
        $data = $this->userModel->adminGetListCustomer();
        if ($data === false) {
            return [];
        }
        return $data;
    }
    public function adminManagerCustomerGetInfoCus()
    {
        $payload = $this->getPayload();
        $userId = $payload["userId"];
        $data  = $this->userModel->adminManagerCustomerGetInfoCus($userId);
        if ($data === false) {
            $this->responseJSON("fald ", false, 404, $payload);
        }
        return  $this->responseJSON("success ", true, 200, $data);
    }
    public function adminManagerCustomerUpdate()
    {
        $payload = $this->getPayload();
        $userId = $payload["userId"];
        $status = $payload["status"];
        $data = $this->userModel->adminManagerCustomerUpdate($userId, $status);
        if ($data === false) {
            $this->responseJSON("fald ", false, 404, $payload);
        }
        return  $this->responseJSON("success ", true, 200, $payload);
    }
}
