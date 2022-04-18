<?php

class ErrorBag
{

    public function put(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }
}

$errors = new ErrorBag;
