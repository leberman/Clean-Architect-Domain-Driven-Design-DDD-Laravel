<?php

namespace App\Jobs\Posts;

use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public int $postID,
        public PostValueObject $object
    ) {}

    public function handle() :void
    {
        $post = Post::find($this->postID);
        $post->update($this->object->toArray());
    }
}
