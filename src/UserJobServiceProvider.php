<?php

namespace Tumarinson\UserJobs;

use Illuminate\Support\ServiceProvider;

class UserJobServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/lang' => lang_path(''),
            'laravel-user-jobs-lang'
        ]);

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
            'laravel-user-jobs-migrations'
        ]);
    }
}
