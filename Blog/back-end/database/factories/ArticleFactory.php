<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_title' => $this->faker->sentence,
            'article_summary' => $this->faker->paragraph,
            'article_content' => $this->faker->text(10000),
            'author_id' => 1,
            'published_at' => now(),
            'status' => 'published',
            'meta_title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
        ];
    }
}
