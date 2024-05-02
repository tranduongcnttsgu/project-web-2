<?php

namespace dto;

class User
{
    private $user_id;
    private $name;
    private $password;
    private $email;
    private $address;
    private $avatar;
    private $status;
    private $phone;
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($p)
    {
        $this->phone = $p;
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

    // Getter và Setter cho $name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Getter và Setter cho $password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter và Setter cho $email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter và Setter cho $address
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Getter và Setter cho $avatar
    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    // Getter và Setter cho $status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
