<?php

namespace Domain\Blogging\Jobs\Posts;

use Domain\Blogging\Actions\DeletePost as DeletePostAction;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeletePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public PostValueObject $object,
        public int $postID
    )
    {}

    public function handle() :void
    {
        DeletePostAction::handle(
            object: $this->object
        );
    }
}
