<?php
declare(strict_types=1);
namespace Domain\Blogging\Aggregates;

use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\Events\PostWasUpdated;
use Domain\Blogging\ValueObjects\PostValueObject;
use \Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PostAggregate extends AggregateRoot
{
    public function createPost(PostValueObject $object, int $userID): self
    {
        $this->recordThat(
            domainEvent: new PostWasCreated(
                object:  $object,
                userID: $userID),
        );
        return $this;
    }

    public function updatePost(PostValueObject $object, int $postUid): self
    {
        $this->recordThat(
            domainEvent: new PostWasUpdated(
                object: $object,
                postUid: $postUid),
        );
        return $this;
    }

}
