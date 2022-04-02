<?php

namespace Tumarinson\UserJobs;

use Illuminate\Support\ServiceProvider;

class UserJobServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'user-jobs');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
