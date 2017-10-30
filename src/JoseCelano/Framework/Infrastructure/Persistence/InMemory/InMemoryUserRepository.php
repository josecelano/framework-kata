<?php

namespace JoseCelano\Framework\Infrastructure\Persistence\InMemory;

use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Domain\UserId;
use JoseCelano\Framework\Domain\UserRepository;
use JoseCelano\Framework\Domain\UserSpecification;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users;

    function __construct()
    {
        $this->users = [];
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
     * @return User
     */
    public function userOfId(UserId $userId)
    {
        foreach ($this->users as $user) {
            if ($user->getId()->equals($userId)) {
                return $user;
            }
        }
        return null;
    }

    /**
     * @param User $user
     */
    public function insert(User $user)
    {
        $this->users[$user->getId()->getValue()] = $user;
    }

    /**
     * @param User $user
     * @throws \Exception
     */
    public function update(User $user)
    {
        $this->users[$user->getId()->getValue()] = $user;
    }

    /**
     * @param User $user
     */
    public function delete(User $user)
    {
        if (isset($this->users[$user->getId()->getValue()])) {
            unset($this->users[$user->getId()->getValue()]);
        }
    }

    /**
     * @param UserSpecification $specification
     * @return User[]
     */
    public function query($specification)
    {
        $results = [];
        foreach ($this->users as $user) {
            if ($specification->specifies($user)) {
                $results[] = $user;
            }
        }
        return $results;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return $this->users;
    }

    /**
     * @param string $email
     * @return User[]
     */
    public function userOfEmail($email)
    {
        $results = [];
        foreach ($this->users as $user) {
            if ($user->getEmail() == $email) {
                $results[] = $user;
            }
        }
        return $results;
    }

    /**
     * @param string $username
     * @return User[]
     */
    public function userOfUsername($username)
    {
        $results = [];
        foreach ($this->users as $user) {
            if ($user->getUsername() == $username) {
                $results[] = $user;
            }
        }
        return $results;
    }
}