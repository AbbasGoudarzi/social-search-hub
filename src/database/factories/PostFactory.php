<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker as PersianFaker;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platform = fake()->randomElement(Post::PLATFORMS);

        switch ($platform) {
            case 'news':
                $newsSources = ['irna.ir', 'isna.ir', 'yjc.ir', 'tabnak.ir', 'khabaronline.ir', 'ettelaat.com'];
                $selectedSource = fake()->randomElement($newsSources);
                $attributes = [
                    'platform' => $platform,
                    'published_at' => fake()->dateTimeBetween('-1 years'),
                    'content' => PersianFaker::paragraph(),
                    'source' => $selectedSource,
                    'url' => 'https://' . $selectedSource . '/news/' . rand(11111, 999999),
                    'extra_data' => ['title' => PersianFaker::sentence()]
                ];
                break;
            case 'instagram':
                $attributes = [
                    'platform' => $platform,
                    'published_at' => fake()->dateTimeBetween('-1 years'),
                    'content' => PersianFaker::paragraph(),
                    'source' => fake()->userName(),
                    'url' => 'https://www.instagram.com/p/' . fake()->regexify('[A-Za-z0-9]{11}') . '/',
                    'extra_data' => ['type' => fake()->randomElement(['video', 'slide', 'image'])]
                ];
                break;
            case 'twitter':
                $twitterUsername = fake()->userName();
                $attributes = [
                    'platform' => $platform,
                    'published_at' => fake()->dateTimeBetween('-1 years'),
                    'content' => PersianFaker::paragraph(),
                    'source' => $twitterUsername,
                    'url' => 'https://x.com/' . $twitterUsername . '/status/' . fake()->numerify(str_repeat('#', 19)),
                ];
                break;
            default:
                $attributes = [];
        }

        return $attributes;
    }
}
