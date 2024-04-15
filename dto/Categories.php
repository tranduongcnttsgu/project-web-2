<?php

namespace dto;

class categories
{
    private $category_id;
    private $name;
    private $status;
    private $create_By;
    // Getter và Setter cho $category_id
    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
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

    // Getter và Setter cho $status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter và Setter cho $create_By
    public function getCreate_By()
    {
        return $this->create_By;
    }

    public function setCreate_By($create_By)
    {
        $this->create_By = $create_By;
    }
}
