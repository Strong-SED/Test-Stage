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

        $titre = fake()->unique()->sentence;
        $context = fake()->paragraphs(asText: true);
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'titre' => $titre,
            'description' => Str::limit($context , 150),
            'context' => $context,
            'image' => null,
            "instruction" => fake()->sentence,
            'created_at' => $created_at,
            'updated_at' => $created_at
        ];
    }
}
