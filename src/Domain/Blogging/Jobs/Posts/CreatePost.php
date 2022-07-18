<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs\Posts;

use Domain\Blogging\Actions\CreatePost as CreatePostAction;
use Domain\Blogging\Aggregates\PostAggregate;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreatePost implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;
    public function __construct(
        public PostValueObject $object,
    ) {
    }

    public function handle(): void
    {

        PostAggregate::retrieve(Str::uuid()->toString())
            ->createPost(
                object: $this->object,
                userID: 1
            )
            ->persist();

//        CreatePostAction::handle(
//            object: $this->object
//        );
    }
}
