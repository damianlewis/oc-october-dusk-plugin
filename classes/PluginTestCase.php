<?php

namespace Tests;

use DamianLewis\OctoberTesting\InitialiseOctober;

/**
 * Class PluginTestCase
 *
 * This is a direct replacement to the PluginTestCase class provided by OctoberCMS in the /tests folder.
 * It makes use of the CreatesApplication trait instead of using a method to create the app. This allows alternative
 * databases to be used as opposed to the in memory database. It also uses the InitialiseOctober trait to carry out the
 * set up and tear down functionality for OctoberCMS.
 *
 * @package Tests
 */
abstract class PluginTestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use CreatesApplication;
    use InitialiseOctober;

    /**
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->setUpOctober();
    }

    protected function tearDown()
    {
        $this->tearDownOctober();
    }
}
