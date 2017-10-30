<?php

namespace JoseCelano\Framework\App\Web;

use JoseCelano\Framework\App\Service\Session;

class Request
{
    private $requestUri;
    private $get;
    private $post;
    private $session;

    /**
     * Request constructor.
     * @param $requestUri
     * @param $get
     * @param $post
     */
    public function __construct($requestUri, $get, $post)
    {
        $this->requestUri = $requestUri;
        $this->get = $get;
        $this->post = $post;
    }

    public static function capture()
    {
        return new self(
            isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/',
            $_GET,
            $_POST
        );
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param Session $session
     * @return $this
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
        return $this;
    }

    public function getRequestUri()
    {
        return $this->requestUri;
    }

    public function get($name, $default = null)
    {
        return isset($this->get[$name]) ? $this->get[$name] : $default;
    }

    public function post($name, $default = null)
    {
        return isset($this->post[$name]) ? $this->post[$name] : $default;
    }
}