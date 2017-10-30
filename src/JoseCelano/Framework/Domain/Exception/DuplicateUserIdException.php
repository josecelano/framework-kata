<?php

namespace JoseCelano\Framework\Domain\Exception;

use Throwable;

class DuplicateUserIdException extends \DomainException
{
    private $userId;

    public function __construct($userId, $message = "Duplicate user id: %s", $code = 0, Throwable $previous = null)
    {
        $this->userId = $userId;
        parent::__construct(sprintf($message, $this->userId), $code, $previous);
    }

    public function getUserId()
    {
        return $this->userId;
    }
}