<?php

namespace JoseCelano\Framework\App\Web;

class Response
{
    protected $content;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function send()
    {
        echo $this->content;
    }
}