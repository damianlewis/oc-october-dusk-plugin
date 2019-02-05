<?php

namespace DamianLewis\OctoberTesting;

use Laravel\Dusk\Browser as BaseBrowser;

/**
 * Class Browser
 *
 * This class extends the functionality of the Laravel\Dusk\Browser class file so as to include concerns
 * related to OctoberCMS.
 *
 * @package DamianLewis\OctoberTesting
 */
class Browser extends BaseBrowser
{
    use Concerns\MakesOctoberAssertions,
        Concerns\InteractsWithOctoberAuthentication;
}
