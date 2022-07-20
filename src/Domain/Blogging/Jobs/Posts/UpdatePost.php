<?php

namespace Domain\Blogging\Jobs\Posts;

use Domain\Blogging\Aggregates\PostAggregate;
use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public PostValueObject $object,
        public int $postID
    ) {
    }

    public function handle(): void
    {
        $post = Post::find($this->postID);

        PostAggregate::retrieve(
            $post->id
        )->updatePost(
            object: $this->object,
            postUid: $post->id
        )->persist();

//        $post->update($this->object->toArray());
    }
}
