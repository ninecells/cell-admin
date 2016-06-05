<?php

namespace NineCells\Admin;

class DotenvStore
{
    public function isAdmin($user)
    {
        $emails = env('ADMIN_EMAILS', '');
        foreach (explode(',', $emails) as $email) {
            if ($email === $user->email) {
                return true;
            }
        }
        return false;
    }
}