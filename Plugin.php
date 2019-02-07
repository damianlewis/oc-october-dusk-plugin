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
            'name' => 'October Testing',
            'description' => 'Enables the use of the Laravel testing frameworks within OctoberCMS',
            'author' => 'Damian Lewis',
            'icon' => 'icon-check-square-o',
        ];
    }

    public function boot()
    {
        App::register(DuskServiceProvider::class);
    }
}
