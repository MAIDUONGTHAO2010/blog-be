<?php

namespace Modules\User\App\Services;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\App\Contracts\Repositories\PostRepositoryInterface;

class PostService
{
    protected PostRepositoryInterface $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getPostsByConditions(array $conditions): Paginator
    {
        return $this->repository->getPostsByConditions(
            $conditions
        );
    }

    public function getPostsByCategories(): Collection
    {
        return $this->repository->getPostsByCategories();
    }
}
