<?php

namespace DamianLewis\OctoberTesting\Concerns;

use DamianLewis\OctoberTesting\Browser;
use Laravel\Dusk\Concerns\ProvidesBrowser as BaseProvidesBrowser;

/**
 * Trait ProvidesBrowser
 *
 * This trait overrides the newBrowser method provided by the Laravel\Dusk\Concerns\ProvidesBrowser trait.
 * It returns instances of DamianLewis\OctoberTesting\Browser as opposed to Laravel\Dusk\Browser.
 *
 * @package DamianLewis\OctoberTesting\Concerns
 */
trait ProvidesBrowser
{
    use BaseProvidesBrowser;

    /**
     * Create a new Browser instance.
     *
     * @param  \Facebook\WebDriver\Remote\RemoteWebDriver $driver
     * @return \DamianLewis\OctoberTesting\Browser
     */
    protected function newBrowser($driver)
    {
        return new Browser($driver);
    }
}
