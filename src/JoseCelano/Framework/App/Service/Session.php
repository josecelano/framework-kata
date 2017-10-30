<?php

namespace JoseCelano\Framework\App\Service;

interface Session
{
    public function start();

    public function destroy();

    public function load($session);

    public function save(& $session);

    public function put($key, $value);

    public function get($key);

    public function pull($key);

    public function delete($key);
}