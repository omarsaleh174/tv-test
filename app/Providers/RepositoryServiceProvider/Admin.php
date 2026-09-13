<?php

namespace App\Providers\RepositoryServiceProvider;

use Illuminate\Support\ServiceProvider;

class Admin extends ServiceProvider
{
    public function register()
    {
    }
    public function boot()
    {
        $this->app->bind(\App\Repositories\Admin\UserRepository::class, \App\Repositories\Admin\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\CategoryRepository::class, \App\Repositories\Admin\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ProductRepository::class, \App\Repositories\Admin\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\CountryRepository::class, \App\Repositories\Admin\CountryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\CityRepository::class, \App\Repositories\Admin\CityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\DepartmentRepository::class, \App\Repositories\Admin\DepartmentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\CategoryRepository::class, \App\Repositories\Admin\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\TypeRepository::class, \App\Repositories\Admin\TypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\TenderRepository::class, \App\Repositories\Admin\TenderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\SubscriptionRepository::class, \App\Repositories\Admin\SubscriptionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ClientRepository::class, \App\Repositories\Admin\ClientRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ConsultantRepository::class, \App\Repositories\Admin\ConsultantRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ConsultationRepository::class, \App\Repositories\Admin\ConsultationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ContactUsRepository::class, \App\Repositories\Admin\ContactUsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\PartRepository::class, \App\Repositories\Admin\PartRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\PhotoRepository::class, \App\Repositories\Admin\PhotoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\BannerRepository::class, \App\Repositories\Admin\BannerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ClassificationRepository::class, \App\Repositories\Admin\ClassificationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Admin\ArticleRepository::class, \App\Repositories\Admin\ArticleRepositoryEloquent::class);
        $this->app->bind(
    \App\Repositories\Admin\OrderRepository::class,
    \App\Repositories\Admin\OrderRepositoryEloquent::class
);
        //:end-bindings:
    }
}
