<?php

namespace Modules\User\App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        \Modules\User\App\Contracts\Repositories\CategoryRepositoryInterface::class => \Modules\User\App\Repositories\Eloquent\CategoryRepository::class,
        \Modules\User\App\Contracts\Repositories\PostRepositoryInterface::class => \Modules\User\App\Repositories\Eloquent\PostRepository::class,
    ];
}
