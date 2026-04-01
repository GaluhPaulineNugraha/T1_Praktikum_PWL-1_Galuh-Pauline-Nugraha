<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $bookshelves = DB::table('bookshelfs')->pluck('id');
        $categories  = DB::table('categories')->pluck('id');

        if ($bookshelves->isEmpty() || $categories->isEmpty()) return;

        foreach (range(1, 50) as $i) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'year' => rand(2000, 2024),
                'publisher' => $faker->company,
                'city' => $faker->city,
                'cover' => null,
                'bookshelf_id' => $bookshelves->random(),
                'category_id' => $categories->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}