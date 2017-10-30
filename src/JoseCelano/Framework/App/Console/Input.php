<?php

namespace JoseCelano\Framework\App\Console;

class Input
{
    private $argv;

    public static function capture()
    {
        global $argv;
        return new self(isset($argv) ? $argv : []);
    }

    public function __construct(array $argv)
    {
        $this->argv = $argv;
    }

    /**
     * @return array
     */
    public function getArgv()
    {
        return $this->argv;
    }

    /**
     * @param int $position
     * @return array
     */
    public function getArgvNumber($position)
    {
        return $this->argv[$position];
    }
}