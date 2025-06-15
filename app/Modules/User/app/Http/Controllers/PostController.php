<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Modules\User\App\Http\Requests\Post\ListPostRequest;
use Modules\User\App\Http\Resources\Post\PostCollection;
use Modules\User\App\Http\Resources\Post\PostResource;
use Modules\User\App\Services\PostService;

class PostController extends Controller
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ListPostRequest $request): PostCollection
    {
        return new PostCollection(
            $this->postService->getPostsByConditions($request->validated()),
            __FUNCTION__
        );
    }

    public function show(Post $post): PostResource
    {
        return new PostResource(
            $post,
            __FUNCTION__
        );
    }

    public function getPostsByCategories(): PostCollection
    {
        return new PostCollection(
            $this->postService->getPostsByCategories(),
            __FUNCTION__
        );
    }
}
