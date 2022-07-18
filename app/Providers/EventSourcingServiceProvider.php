<?php

namespace App\Providers;

use Domain\Blogging\Aggregates\PostAggregate;
use Domain\Blogging\Projectors\PostProjectors;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class EventSourcingServiceProvider extends ServiceProvider
{

    public function register():void
    {
        Projectionist::addProjectors(
            projectors: [PostProjectors::class],
        );
    }


    public function boot():void
    {
        //
    }
}
