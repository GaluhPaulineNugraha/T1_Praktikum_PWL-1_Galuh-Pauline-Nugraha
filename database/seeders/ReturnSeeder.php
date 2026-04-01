<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReturnSeeder extends Seeder
{
    public function run(): void
    {
        $details = DB::table('loan_detail')->pluck('id');

        if ($details->isEmpty()) return;

        $data = [];

        foreach (range(1, 50) as $i) {
            $charge = rand(0,1);

            $data[] = [
                'loan_detail_id' => $details->random(),
                'charge' => $charge,
                'amount' => $charge ? rand(1000,50000) : 0,
            ];
        }

        DB::table('returns')->insert($data);
    }
}