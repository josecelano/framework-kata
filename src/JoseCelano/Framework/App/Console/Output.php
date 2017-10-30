<?php

namespace JoseCelano\Framework\App\Console;

class Output
{
    private $text;

    public function __construct($text = '')
    {
        $this->text = $text;
    }

    public function writeLn($text)
    {
        $this->text = $this->text . $text;
    }

    public function getBuffer()
    {
        return $this->text;
    }

    public function send()
    {
        echo $this->text;
    }
}