<?php

namespace Laravel\Dusk;

use Closure;
use DamianLewis\OctoberTesting\Concerns\ProvidesBrowser;
use DamianLewis\OctoberTesting\InitialiseOctober;
use Exception;
use Throwable;
use ReflectionFunction;
use Illuminate\Support\Collection;
use Laravel\Dusk\Chrome\SupportsChrome;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Foundation\Testing\TestCase as FoundationTestCase;

/**
 * Class TestCase
 *
 * This replaces the Laravel\Dusk\TestCase class provided by Laravel Dusk.
 * It makes use of the InitialiseOctober trait to carry out the set up and tear down functionality for OctoberCMS.
 *
 * @package DamianLewis\OctoberTesting
 */
abstract class TestCase extends FoundationTestCase
{
    use ProvidesBrowser,
        SupportsChrome,
        InitialiseOctober;

    /**
     * Register the base URL with Dusk.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->setUpOctober();

        Browser::$baseUrl = $this->baseUrl();

        Browser::$storeScreenshotsAt = base_path('tests/Browser/screenshots');

        Browser::$storeConsoleLogAt = base_path('tests/Browser/console');

        Browser::$userResolver = function () {
            return $this->user();
        };
    }

    protected function tearDown()
    {
        $this->tearDownOctober();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()
        );
    }

    /**
     * Determine the application's base URL.
     *
     * @var string
     */
    protected function baseUrl()
    {
        return config('app.url');
    }

    /**
     * Get a callback that returns the default user to authenticate.
     *
     * @return \Closure
     * @throws \Exception
     */
    protected function user()
    {
        throw new Exception("User resolver has not been set.");
    }
}
