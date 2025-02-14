<?php

namespace Database\Factories;

use App\Models\TwitterPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker as PersianFaker;

/**
 * @extends Factory<TwitterPost>
 */
class TwitterPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = fake()->userName();
        return [
            'published_at' => fake()->dateTimeBetween('-1 years'),
            'content' => PersianFaker::paragraph(),
            'source' => $username,
            'url' => 'https://x.com/' . $username . '/status/' . fake()->numerify(str_repeat('#', 19)),
        ];
    }
}
