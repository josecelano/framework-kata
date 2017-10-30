<?php

namespace JoseCelano\Framework\Presentation\Dto;

class UserDto
{
    /** @var  string */
    private $id;

    /** @var  string */
    private $username;

    /** @var  string */
    private $email;

    /** @var  string */
    private $password;

    /**
     * User constructor.
     * @param string $userId
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public function __construct($userId, $username, $email, $password)
    {
        $this->id = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}