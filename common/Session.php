<?php

class Session
{
    public static function put(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    public static function all(): array
    {
        return $_SESSION;
    }

    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }
}
