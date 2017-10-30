<?php

namespace JoseCelano\Framework\App\Command;

class CreateUserCommand implements Command
{
    private $userId;
    private $username;
    private $email;
    private $password;

    /**
     * CreateUserConsoleCommand constructor.
     * @param $userId
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($userId, $username, $email, $password)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}