<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn(User $user)
    {
        if (! $user) {
            $user = create(User::class);
        }

        $this->be($user);

        return $user;
    }
}
