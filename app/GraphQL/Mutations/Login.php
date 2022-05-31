<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Auth;


class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // $guard = Auth::guard(config('sanctum.guard', 'web'));

        $guard = Auth::guard(config('guard.sanctum', 'web'));

        if (!$guard->attempt($args)) {
            throw new Error('Invalid credentials.');
        }

        $user = $guard->user();

        return $user;
    }
}
