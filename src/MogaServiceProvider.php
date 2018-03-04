<?php

namespace Moga;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class MogaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/./../resources/views', 'survey');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }

    private function registerPublishables()
    {
        $basePath = dirname(__DIR__);

        $arrPublishable = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' => [
                "$basePath/publishable/config/survey.php" => config_path('survey.php'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

}