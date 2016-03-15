<?php

namespace NineCells\Admin;

class DotenvStore
{
    public function isAdmin($user)
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