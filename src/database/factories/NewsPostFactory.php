<?php

namespace Database\Factories;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker as PersianFaker;

/**
 * @extends Factory<NewsPost>
 */
class NewsPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $newsSources = ['irna.ir', 'isna.ir', 'yjc.ir', 'tabnak.ir', 'khabaronline.ir', 'ettelaat.com'];
        $selectedSource = fake()->randomElement($newsSources);
        return [
            'published_at' => fake()->dateTimeBetween('-1 years'),
            'title' => PersianFaker::sentence(),
            'content' => PersianFaker::paragraph(),
            'source' => $selectedSource,
            'url' => 'https://' . $selectedSource . '/news/' . rand(11111, 999999), // fake()->url()
        ];
    }
}
