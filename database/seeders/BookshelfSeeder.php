<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshelfSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        foreach (range(1, 50) as $i) {
            $data[] = [
                'code' => 'BS' . str_pad($i, 3, '0', STR_PAD_LEFT), 
                'name' => 'Rak ' . $i,
            ];
        }

        DB::table('bookshelfs')->insert($data);
    }
}