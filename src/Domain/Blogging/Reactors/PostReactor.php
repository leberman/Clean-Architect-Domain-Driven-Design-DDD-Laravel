<?php

declare(strict_types=1);

namespace Domain\Blogging\Reactors;

use App\Mail\Posts\NewPost;
use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\Events\PostWasUpdated;
use Domain\Shared\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class PostReactor extends Reactor implements ShouldQueue
{
    public function onPostWasCreated(PostWasCreated $event):void
    {
        $author = User::find($event->userID);

        Mail::to($author->email)->send(
            mailable: new NewPost(
                object: $event->object,
            ),
        );

    }

    public function onPostWasUpdated(PostWasUpdated $event):void
    {
        $post = Post::find($event->postUid);
        $user = User::find($post->user_id);

        Mail::to($user->email)->send(
            mailable: new NewPost(
                object: $event->object,
            ),
        );

    }
}
