<?php
declare(strict_types=1);
namespace Domain\Blogging\Events;

use Domain\Blogging\ValueObjects\PostValueObject;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PostWasUpdated extends ShouldBeStored
{
    public function __construct(
        public PostValueObject $object,
        public int $postUid
    )
    {}
}
