<?php

namespace dto;

class UserPermission
{
    private $user_permission_id;
    private $user_id;
    // Getter và Setter cho $user_permission_id
    public function getUser_permission_id()
    {
        return $this->user_permission_id;
    }

    public function setUser_permission_id($user_permission_id)
    {
        $this->user_permission_id = $user_permission_id;
    }

    // Getter và Setter cho $user_id
    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
}
