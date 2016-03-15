<?php

namespace NineCells\Admin;

class AdminHelper
{
    public static function isAdmin($user)
    {
        $names = env('ADMIN_NAMES', '');
        foreach (explode(',', $names) as $name) {
            if ($name === $user->name) {
                return true;
            }
        }
        return false;
    }
}