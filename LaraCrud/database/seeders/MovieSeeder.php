<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Category;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();

        // list of fake data where the movie will be made of
        $title1 = ['Shadow', 'Broken', 'Neon', 'funny', 'Scarlet', 'Iron', 'scary', 'the'];
        $title2 = ['City', 'Sky', 'Nights', 'Moon', 'Valley', 'Movie', 'brain', 'hero'];
        $directors = ['John Doe', 'Jane Smith', 'Pat Johnson', 'Chris Lee', 'Sam Parker', 'pattje72', 'Sven Metselaars'];

        // Create fake movies
        foreach (range(1, 1) as $i) {
            $movie = Movie::create([
                'title' => $faker->randomElement($title1) . " " . $faker->randomElement($title2),
                'director' => $faker->randomElement($directors),
                'summary' => $faker->sentence(20),
                'price' => $faker->randomFloat(2, 4.99, 24.99),
                'img' => $faker->numberBetween(1, 8) . ".webp",
                'vid' => $faker->numberBetween(1, 8) . ".mp4",
            ]);

            // Attach 1–3 random categories to that movie
            $movie->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}