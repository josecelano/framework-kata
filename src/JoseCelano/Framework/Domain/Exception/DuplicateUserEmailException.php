<?php

namespace JoseCelano\Framework\Domain\Exception;

use Throwable;

class DuplicateUserEmailException extends \DomainException
{
    private $email;

    public function __construct($email, $message = "Duplicate email: %s", $code = 0, Throwable $previous = null)
    {
        $this->email = $email;
        parent::__construct(sprintf($message, $this->email), $code, $previous);
    }

    public function getEmail()
    {
        return $this->email;
    }
}