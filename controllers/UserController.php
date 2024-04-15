<?php

namespace controllers;

use core\Controller;
use models\UserModel;

class UserController extends Controller
{
    private UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {
        $payload = $this->getPayload();
        $email = $payload["email"] ?? "";
        $data = $this->userModel->getUserByEmail($email) ??  false;
        if (sizeof($data) === 0 || !$data) {
            return  json_encode(["message" => "user not exist!", "success" => false, "code" => 404]);
        }
        $password =  $payload["password"];
        if (strcasecmp($password, $data[0]["password"]) === 0) {
            $this->cookiePush("userLogin", $data[0]["user_id"], 7, "/");

            $this->cookiePush("action_group", $data[0]["action_group"], 7, "/");
            return json_encode(["message" => "login success", "success" => true, "code" => 200, "info" => ["userId" => $data[0]["user_id"], "action_group" => $data[0]["action_group"]]]);
        }
        return  json_encode(["message" => "password or   email invalid!", "success" => false, "code" => 200]);
    }
    public function logout()
    {
        $this->cookieDelete("userLogin");
        $this->cookieDelete("action_group");
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
}
