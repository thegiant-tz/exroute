<?php 
namespace Thegiant\ExRoute;

use Illuminate\Support\Facades\Session;

class Auth {
    static function login($user) {
        return Session::put('user', (object) $user);
    }

    static function user() {
        return Session::get('user', (object) ['token' => null]);
    }

    static function check() {
        return !is_null(self::user()->token);
    }
}