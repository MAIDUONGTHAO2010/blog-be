<?php

namespace Modules\User\App\Http\Resources\Post;

use App\Http\Resources\BaseResource;

class PostResource extends BaseResource
{
    public function index(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'description' => $this->description,
            'view_count' => $this->view_count,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ],
            'tags' => $this->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name,
                ];
            }),
            'image_url' => $this->image_url,
            'created_at' => $this->created_at,
        ];
    }

    public function getPostsByCategories(): array
    {
        return $this->index();
    }

    public function show(): array
    {
        return $this->index();
    }
}
