<?php

class Auth
{
    public static function check(): bool
    {
        return Session::has('auth');
    }

    public static function guest(): bool
    {
        return !Session::has('auth');
    }

    public static function user(): User|null
    {
        $auth = Session::get('auth');
        if ($auth) {
            $user = new User;
            $user->id = $auth['id'];
            $user->name = $auth['name'];
            $user->email = $auth['email'];

            return $user;
        }
        return null;
    }

    public static function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
        }
    }
}


//Auth::check();
//Auth::user();
//Auth::logout();