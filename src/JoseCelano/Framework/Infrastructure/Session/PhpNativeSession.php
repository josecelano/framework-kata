<?php

namespace JoseCelano\Framework\Infrastructure\Session;

use JoseCelano\Framework\App\Service\Session;

class PhpNativeSession implements Session
{
    private $data;
    private $delete;

    public function __construct()
    {
        $this->data = [];
        $this->delete = [];
    }

    public function start()
    {
        $this->sessionStartIfNotStartedYet();
    }

    public function destroy()
    {
        session_destroy();
    }

    public function load($session)
    {
        $this->data = isset($session['data']) ? $session['data'] : [];
    }

    /**
     * @param $session
     */
    public function save(& $session)
    {
        $this->cleanDeleted();
        $session['data'] = $this->data;
    }

    public function put($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function pull($key)
    {
        $value = $this->get($key);
        $this->delete($key);
        return $value;
    }

    public function delete($key)
    {
        $this->delete[] = $key;
    }

    private function sessionStartIfNotStartedYet()
    {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    private function cleanDeleted()
    {
        foreach ($this->data as $key => $data) {
            if (in_array($key, $this->delete)) {
                unset($this->data[$key]);
            }
        }
    }
}