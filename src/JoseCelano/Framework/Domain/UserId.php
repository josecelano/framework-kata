<?php

namespace JoseCelano\Framework\Domain;

class UserId
{
    /**
     * @var string
     */
    private $value;

    public static function fromString($value)
    {
        return new self($value);
    }

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @param $value
     * @return UserId
     */
    public static function create($value)
    {
        return new self($value);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @param UserId $userId
     * @return bool
     */
    public function equals(UserId $userId)
    {
        if ($this->value === $userId->getValue())
            return true;
        else
            return false;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}