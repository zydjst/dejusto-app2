<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app){
            $users = [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'gender' => 'Male'
                ],
                [
                    'id' => 2,
                    'name' => 'Jane Doe',
                    'gender' => 'Female'
                ],
                [
                    'id' => 3,
                    'name' => 'Izzy DJ',
                    'gender' => 'Female'
                ]
            ];
            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
