<?php

namespace JoseCelano\Framework\Infrastructure\Persistence\MySql;

class DBConfig
{
    private $hostname;
    private $port;
    private $database;
    private $username;
    private $password;

    /**
     * DBConfig constructor.
     * @param $hostname
     * @param $port
     * @param $database
     * @param $username
     * @param $password
     */
    public function __construct($hostname, $port, $database, $username, $password)
    {
        $this->hostname = $hostname;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
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
    public function getPassword()
    {
        return $this->password;
    }
}