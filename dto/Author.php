<?php

namespace dto;

class Author
{
    private $authorId;
    private $name;
    // Getter và Setter cho $authorId
    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
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
}
