<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
            DB::table('chats')->insert([
                'sender' => rand(1, 100),
                'receiver' => rand(101, 200),
                'content' => Str::random(20),
            ]);
        }
        for ($i = 0; $i < 500; $i++) {
            DB::table('chats')->insert([
                'sender' => rand(101, 200),
                'receiver' => rand(1, 100),
                'content' => Str::random(20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
