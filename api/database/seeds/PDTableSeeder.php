<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('patient_diseases')->insert([
                'patient' => rand(5, 24),
                'disease' => rand(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
