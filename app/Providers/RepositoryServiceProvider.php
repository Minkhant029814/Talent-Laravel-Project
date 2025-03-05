<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Permissions\PermissionRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Roles\RoleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(ProductRepositoryInterface::class , ProductRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class , CategoryRepository::class);
        $this->app->singleton(UserRepositoryInterface::class , UserRepository::class);
        $this->app->singleton(RoleRepositoryInterface::class , RoleRepository::class);
        $this->app->singleton(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->singleton(ImageRepositoryInterface::class, ImageRepository::class);


    }
}
