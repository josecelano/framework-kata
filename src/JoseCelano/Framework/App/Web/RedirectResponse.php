<?php

namespace JoseCelano\Framework\App\Web;

class RedirectResponse extends Response
{
    private $location;

    public function __construct($location, $content = '')
    {
        $this->location = $location;
        parent::__construct($content);
    }

    public function send()
    {
        header("Location: {$this->location}");
    }
}