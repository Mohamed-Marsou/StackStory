<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleImageRelation>
 */
class ArticleImageRelationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article_id' => \App\Models\Article::factory()->create()->id,
            'image_id' => \App\Models\Image::factory()->create(['image_path' => 'public/images/zayd.jpg'])->id,

        ];
    }
}
