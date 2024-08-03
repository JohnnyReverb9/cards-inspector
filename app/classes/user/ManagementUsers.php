<?php

namespace App\classes\user;

use App\classes\ManagementBase;
use App\Models\User;

class ManagementUsers extends ManagementBase
{
    private static array $list_users = [];

    private static function findUsers()
    {
        self::$list_users = User::all();
    }

    public static function getArrayMapUsers(): array
    {
        self::findUsers();

        $ret = [];

        foreach (self::$list_users as $user)
        {
            $ret[$user->id] = $user;
        }

        return $ret;
    }
}
