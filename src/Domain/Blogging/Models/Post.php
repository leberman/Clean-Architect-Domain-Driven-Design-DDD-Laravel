<?php

declare(strict_types=1);

namespace Domain\Blogging\Models;

use Domain\Blogging\Models\Builders\PostBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\Pure;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'published',
        'user_id'
    ];


    protected $casts = [
        'published' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: Post::class,
            foreignKey: 'user_id'
        );
    }

    #[Pure] public function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder(
            query : $query
        );
    }
}