<?php

use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;

test('it check status api for posts', function () {
    get(route('api:v1:posts:index'))
        ->assertStatus(Http::OK);
});

//namespace Tests\Api\V1;
//
//class PostsTest
//{
//
//}
