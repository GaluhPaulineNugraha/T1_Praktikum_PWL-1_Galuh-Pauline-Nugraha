<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        foreach (range(1, 50) as $i) {
            $data[] = [
                'category' => 'Kategori ' . $i,
            ];
        }

        DB::table('categories')->insert($data);
    }
}