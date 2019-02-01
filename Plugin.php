<?php

namespace DamianLewis\OctoberTesting;

use App;
use Laravel\Dusk\DuskServiceProvider;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'October Dusk',
            'description' => 'Enables the use of Laravel Dusk for OctoberCMS',
            'author' => 'Damian Lewis',
            'icon' => 'icon-check-square-o',
        ];
    }

    public function boot()
    {
        App::register(DuskServiceProvider::class);
    }
}
