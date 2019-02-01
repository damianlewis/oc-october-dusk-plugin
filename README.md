# October Testing
Enables the use of the Laravel testing framework within OctoberCMS.

## Usage

### Installation
Install via Composer:
```bash
composer require --dev damianlewis/octobertesting-plugin
```

### Plugin Testing
To test plugins, create a `tests` folder within the plugin base folder and copy the `phpunit.xml` file to this location, for example, `/plugins/acme/blog/tests/phpunit.xml`. Create sub folders for feature and unit tests, for example, `/plugins/acme/blog/tests/feature/` and `/plugins/acme/blog/tests/unit/`. Then in the tests folders, create tests following the principles used for [Laravel testing](https://laravel.com/docs/5.5/testing). Test suites have been configured within the `phpunit.xml` file for feature and unit tests.

When creating tests, use the alternative `PluginTestCase` class, which makes use of a `CreatesApplication` trait as opposed to the `CreatesApplication` method found in the `PluginTestCase` class provided by OctoberCMS. This alternative class doesn't make use of an in memory database, allowing you to choose what database you wish to use for testing. See example below.
```php
<?php

namespace Acme\Blog\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\PluginTestCase;

class ExampleTest extends PluginTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
```

### Laravel Dusk
To make use of Laravel Dusk with OctoberCMS, run the `dusk:install` Artisan command:
```bash
php artisan dusk:install
```

Then use Dusk as you would with Laravel, see [Laravel Dusk](https://laravel.com/docs/5.5/dusk#installation). For example, to run tests from the CLI use the `dusk` Artisan command:
```bash
php artisan dusk
```
