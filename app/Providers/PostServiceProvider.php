<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider; 
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);
    }
}
