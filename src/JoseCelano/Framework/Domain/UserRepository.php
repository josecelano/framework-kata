<?php

namespace JoseCelano\Framework\Domain;

interface UserRepository
{
    /**
     * @return UserId
     */
    public function nextIdentity();

    /**
     * @param UserId $userId
     * @return User|null
     */
    public function userOfId(UserId $userId);

    /**
     * @param string $email
     * @return User|null
     */
    public function userOfEmail($email);

    /**
     * @param string $username
     * @return User|null
     */
    public function userOfUsername($username);

    /**
     * @param User $user
     */
    public function insert(User $user);

    /**
     * @param User $user
     * @throws \Exception
     */
    public function update(User $user);

    /**
     * @param User $user
     */
    public function delete(User $user);

    /**
     * @param UserSpecification $specification
     * @return User[]
     */
    public function query($specification);

    /**
     * @return User[]
     */
    public function findAll();
}