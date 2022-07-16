<?php

declare(strict_types=1);

namespace Domain\Blogging\Actions;

use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject;

class DeletePost
{
    public static function handle(PostValueObject $object)
    {
//        return $post->update($object->toArray());
    }
}
