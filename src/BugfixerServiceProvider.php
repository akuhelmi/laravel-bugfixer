<?php

namespace Aku\Bugfixer;

use Illuminate\Support\ServiceProvider;

class BugfixerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bugfixer.php', 'bugfixer');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bugfixer.php' => config_path('bugfixer.php'),
        ], 'config');
    }
}
