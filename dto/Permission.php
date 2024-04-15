<?php

namespace dto;

class Permission
{
    private $permission_id;
    private $action;
    private $user_permission_id;

    // Getter và Setter cho $permission_id
    public function getPermission_id()
    {
        return $this->permission_id;
    }

    public function setPermission_id($permission_id)
    {
        $this->permission_id = $permission_id;
    }

    // Getter và Setter cho $action
    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    // Getter và Setter cho $user_permission_id
    public function getUser_permission_id()
    {
        return $this->user_permission_id;
    }

    public function setUser_permission_id($user_permission_id)
    {
        $this->user_permission_id = $user_permission_id;
    }
}
