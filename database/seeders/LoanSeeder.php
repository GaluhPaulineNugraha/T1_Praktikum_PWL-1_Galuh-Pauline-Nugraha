<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->pluck('npm');

        if ($users->isEmpty()) return;

        $data = [];

        foreach (range(1, 50) as $i) {
            $data[] = [
                'user_npm' => $users->random(),
                'loan_at' => now(),
                'return_at' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('loans')->insert($data);
    }
}