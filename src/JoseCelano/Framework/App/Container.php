<?php

namespace JoseCelano\Framework\App;

class Container
{
    private $data;

    public function addService($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function addParameter($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getService($key)
    {
        return $this->data[$key];
    }

    public function getParameter($key)
    {
        return $this->data[$key];
    }

    public function exists($key)
    {
        return isset($this->data[$key]);
    }
}