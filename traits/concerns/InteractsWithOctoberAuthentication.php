<?php

namespace DamianLewis\OctoberTesting\Concerns;

use DamianLewis\OctoberTesting\Browser;

/**
 * Trait InteractsWithOctoberAuthentication
 *
 * This trait overrides the methods found in the Laravel\Dusk\Concerns\InteractsWithAuthentication trait, providing
 * the authentication functionality used in OctoberCMS.
 *
 * @package DamianLewis\OctoberTesting\Concerns
 */
trait InteractsWithOctoberAuthentication
{
    /**
     * Log into the application as the default user.
     *
     * @return $this
     */
    public function login()
    {
        return $this->loginAs(call_user_func(Browser::$userResolver));
    }

    /**
     * Log into the application using a given user credentials.
     *
     * @param  object $userCredentials
     * @param  string $guard
     * @return $this
     */
    public function loginAs($userCredentials, $guard = null)
    {
        return $this->visit('/backend')
            ->type('login', $userCredentials->login)
            ->type('password', $userCredentials->password)
            ->press('Login');
    }

    /**
     * Log out of the application.
     *
     * @param  string $guard
     * @return $this
     */
    public function logout($guard = null)
    {
        return $this->visit('/backend/auth/signout');
    }
}
