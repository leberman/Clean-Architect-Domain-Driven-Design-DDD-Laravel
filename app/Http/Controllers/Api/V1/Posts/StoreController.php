<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Factories\PostFactory;
use JustSteveKing\StatusCode\Http;
use \App\Jobs\Posts\CreatePost;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
    {
        CreatePost::dispatch(PostFactory::create(
            attributes: $request->validated(),
        ));

        return response(content: null,status: Http::CREATED);
    }
}
