# October Testing
Enables the use of the Laravel testing framework within OctoberCMS.

## Usage

### Installation
Install via Composer:
```bash
composer require --dev damianlewis/octobertesting-plugin
```

### Plugin Feature & Unit Tests
To test plugins, create a `tests` folder within the plugin base folder and copy the `phpunit.xml` file to this location, for example, `/plugins/acme/blog/tests/phpunit.xml`. Create sub folders for feature and unit tests, for example, `/plugins/acme/blog/tests/feature/` and `/plugins/acme/blog/tests/unit/`. Then in the tests folders, create tests following the principles used for [Laravel testing](https://laravel.com/docs/5.5/testing). Test suites have been configured within the `phpunit.xml` file for feature and unit tests.

When creating tests, use the alternative `Tests\PluginTestCase` class. This alternative class doesn't make use of an in memory database, allowing you to choose what database you wish to use for testing. See example below.
```php
<?php

namespace Acme\Blog\Tests\Feature;

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

#### Authentication
To make use of the `login` and `loginAs` authentication methods, an object containing the `login` and `password` for the user is expected. To provide the default/admin user account, you can override the `user` method in the `Tests\DuskTestCase` class as follows:
```php
<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    
    ...
    
    protected function user()
    {
        return (object)[
            'login' => 'admin',
            'password' => 'admin'
        ];
    }
}
```

#### Screenshots
To create browser screenshots add the `--window-size` argument to the `ChromeOptions->addArguments` method as shown below:
```php
$options = (new ChromeOptions)->addArguments([
    '--disable-gpu',
    '--window-size=1280,1024',
    '--headless'
]);
```
