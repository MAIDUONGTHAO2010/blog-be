<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Post;

abstract class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    public function model(): string
    {
        return Post::class;
    }
}
