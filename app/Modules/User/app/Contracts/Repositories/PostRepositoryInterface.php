<?php

namespace Modules\User\App\Contracts\Repositories;

use App\Contracts\Repositories\PostRepositoryInterface as BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function getPostsByConditions($conditions = []): Paginator;

    public function getPostsByCategories(): Collection;
}
