<?php

namespace App\Http\Helpers;

use App\Models\User;

class LoginHelper
{
    /**
     * @param $surname
     * @param $name
     * @return string
     */
    public static function createLogin($surname, $name): string
    {
        $login = $surname . substr($name, 0, 3);

        $count = 0;
        $newLogin = $login;
        while (self::isLoginExists($newLogin)) {
            $count++;
            $newLogin = $login . '_' . $count;
        }

        return $newLogin == $login ? $login : $newLogin;
    }
    
    /**
     * @param $login
     * @return bool
     */
    private static function isLoginExists($login): bool
    {
        $exists = User::where('login', $login)
            ->first();

        if ($exists) {
            return true;
        }

        return false;
    }
}
