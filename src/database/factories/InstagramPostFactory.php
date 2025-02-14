<?php

namespace Database\Factories;

use App\Models\InstagramPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker as PersianFaker;

/**
 * @extends Factory<InstagramPost>
 */
class InstagramPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'published_at' => fake()->dateTimeBetween('-1 years'),
            'type' => fake()->randomElement(InstagramPost::TYPES),
            'content' => PersianFaker::paragraph(),
            'source' => fake()->userName(),
            'url' => 'https://www.instagram.com/p/' . fake()->regexify('[A-Za-z0-9]{11}') . '/',
        ];
    }
}
