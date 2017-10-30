<?php

namespace JoseCelano\Framework\Infrastructure\Persistence\MySql;

use JoseCelano\Framework\Domain\SqlSpecification;
use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Domain\UserId;
use JoseCelano\Framework\Domain\UserRepository;
use mysqli;

class MySqlUserRepository implements UserRepository
{
    /**
     * @var string
     */
    private $hostname;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $database;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var mysqli
     */
    private $conn;

    function __construct(DBConfig $dbConfig)
    {
        $this->hostname = $dbConfig->getHostname();
        $this->port = $dbConfig->getPort();
        $this->database = $dbConfig->getDatabase();
        $this->username = $dbConfig->getUsername();
        $this->password = $dbConfig->getPassword();
    }

    /**
     * @return UserId
     */
    public function nextIdentity()
    {
        $id = strtoupper(str_replace('.', '', uniqid('', true)));
        return UserId::create($id);
    }

    /**
     * @param UserId $userId
     * @return User|null
     */
    public function userOfId(UserId $userId)
    {
        return $this->findUserBy('id', $userId->getValue());
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function userOfEmail($email)
    {
        return $this->findUserBy('email', $email);
    }

    /**
     * @param string $username
     * @return User|null
     */
    public function userOfUsername($username)
    {
        return $this->findUserBy('username', $username);
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function insert(User $user)
    {
        $this->connect();

        $id = mysqli_real_escape_string($this->conn, $user->getId()->getValue());
        $username = mysqli_real_escape_string($this->conn, $user->getUsername());
        $email = mysqli_real_escape_string($this->conn, $user->getEmail());
        $password = mysqli_real_escape_string($this->conn, $user->getPassword());

        $sql = sprintf("INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES ('%s', '%s', '%s', '%s')", $id, $username, $email, $password);

        if (!mysqli_query($this->conn, $sql)) {
            throw new \Exception("Error: " . $sql . "SQL Error" . mysqli_error($this->conn));
        }

        $this->closeConnection();
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function update(User $user)
    {
        // TODO
        throw new \Exception("update not implemented");
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function delete(User $user)
    {
        // TODO
        throw new \Exception("delete not implemented");
    }

    /**
     * @param SqlSpecification $specification
     * @return \JoseCelano\Framework\Domain\User[]
     * @throws \Exception
     */
    public function query($specification)
    {
        $this->connect();

        $clauses = $specification->toSqlClauses();
        $sql = sprintf("SELECT * FROM `user` WHERE %s;", $clauses);

        $result = mysqli_query($this->conn, $sql);

        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new User(new UserId($row["id"]), $row["username"], $row["email"], $row["password"]);
                $users[] = $user;
            }
        }

        $this->closeConnection();

        return $users;
    }

    /**
     * @return \JoseCelano\Framework\Domain\User[]
     * @throws \Exception
     */
    public function findAll()
    {
        // TODO
        throw new \Exception("findAll not implemented");
    }

    private function connect()
    {
        // Create connection
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database, $this->port);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    private function closeConnection()
    {
        mysqli_close($this->conn);
    }

    /**
     * @param string $fieldName
     * @param mixed $value
     * @return User|null
     * @internal param string $username
     */
    private function findUserBy($fieldName, $value)
    {
        $this->connect();

        $sql = sprintf("SELECT * FROM `user` WHERE %s = '%s';", $fieldName, $value);

        $result = mysqli_query($this->conn, $sql);

        $user = null;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = $this->userFromRow($row);
                break;
            }
        }

        return $user;
    }

    private function userFromRow($row)
    {
        return new User(new UserId($row["id"]), $row["username"], $row["email"], $row["password"]);
    }
}