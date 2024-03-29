<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\UpdateRequest;
use Domain\Blogging\Factories\PostFactory;
use Domain\Blogging\Jobs\Posts\DeletePost;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;

class DeleteController extends Controller
{
    public function __invoke(UpdateRequest $request, $postID): Response
    {
        //delete
//        $post->delete();
        DeletePost::dispatch(
            object: PostFactory::create(
                attributes: $request->validated()
            ),
            postID: $postID
        );

        return response(
            content: null,
            status: Http::ACCEPTED
        );
    }
}
