<?php

namespace JoseCelano\Framework\Domain;

class CheckLoginUserSpecification implements UserSpecification, SqlSpecification
{
    /**
     * @var string
     */
    private $usernameOrEmail;

    /**
     * @var string
     */
    private $password;

    public function __construct($usernameOrEmail, $password)
    {
        $this->usernameOrEmail = $usernameOrEmail;
        $this->password = $password;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function specifies(User $user)
    {
        return (($user->getUsername() == $this->usernameOrEmail || $user->getEmail() == $this->usernameOrEmail)
            && $user->getPassword() == $this->password);
    }

    /**
     * @return string
     */
    public function toSqlClauses()
    {
        $clause = sprintf("(`username` = '%s' or `email` = '%s') and `password` = '%s'",
            $this->usernameOrEmail, $this->usernameOrEmail, $this->password);
        return $clause;
    }
}