<?php

namespace JoseCelano\Framework\App\Facade;

class App
{
    /**
     * @param $id
     * @return mixed
     */
    public static function getService($id)
    {
        return app()->getService($id);
    }

    /**
     * Throw an HttpException with the given data.
     *
     * @param  int $code
     * @param  string $message
     * @param  array $headers
     * @return void
     */
    public static function abort($code = 200, $message = '', $headers = [])
    {
        app()->abort($code, $message, $headers);
    }
}