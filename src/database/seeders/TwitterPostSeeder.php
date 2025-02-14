<?php

namespace Database\Seeders;

use App\Models\TwitterPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TwitterPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TwitterPost::factory(500)->create();
    }
}
