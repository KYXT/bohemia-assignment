<?php

namespace App\Http\Helpers;

use App\Models\User;

class EmailHelper
{
    /**
     * @param $email
     * @return string
     */
    public static function createEmail($email): string
    {
        $newEmail = $email;
        $count = 0;
        
        while (self::isEmailExists($email)) {
            $count++;
            $newEmail = $email . $count;
        }

        return $newEmail == $email ? $email : $newEmail;
    }
    
    /**
     * @param $login
     * @return bool
     */
    private static function isEmailExists($email): bool
    {
        $exists = User::where('email', $email)
            ->first();

        if ($exists) {
            return true;
        }

        return false;
    }
}
