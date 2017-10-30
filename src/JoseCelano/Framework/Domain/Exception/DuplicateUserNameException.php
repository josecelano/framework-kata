<?php

namespace JoseCelano\Framework\Domain\Exception;

use Throwable;

class DuplicateUserNameException extends \DomainException
{
    private $userName;

    public function __construct($userName, $message = "Duplicate userName: %s", $code = 0, Throwable $previous = null)
    {
        $this->userName = $userName;
        parent::__construct(sprintf($message, $this->userName), $code, $previous);
    }

    public function getUserName()
    {
        return $this->userName;
    }
}