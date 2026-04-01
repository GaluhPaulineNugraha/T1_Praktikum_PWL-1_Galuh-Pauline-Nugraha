<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $loans = DB::table('loans')->pluck('id');
        $books = DB::table('books')->pluck('id');

        if ($loans->isEmpty() || $books->isEmpty()) return;

        $data = [];

        foreach (range(1, 50) as $i) {
            $data[] = [
                'loan_id' => $loans->random(),
                'book_id' => $books->random(),
                'is_return' => rand(0,1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loan_detail')->insert($data);
    }
}