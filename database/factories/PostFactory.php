<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $title = $this->faker->realText(50);
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }
//        $category = $this->faker->randomElement(['Cat1','Cat2','Cat3']);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $post,
            'description' => $this->faker->realText,
            'published' => $this->faker->boolean
        ];
    }
}
