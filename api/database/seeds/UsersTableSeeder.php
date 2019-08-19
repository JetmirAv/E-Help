<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(5) . '@mail.com',
                'password' => bcrypt('password'),
                'role_id' => 2,
                'doctor' => null,
                'surname' => Str::random(10),
                'img' => "nAo34XzMNvzHX7w3wgaR5tKEdXVPlf002kfNMj1s.png",
                'password' => bcrypt("Aa123456"),
                'birthday' => Carbon::now(),
                'address' => Str::random(10),
                'city' => Str::random(10),
                'state' => Str::random(10),
                'postal' => Str::random(10),
                'phone_number' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(5) . '@mail.com',
                'password' => bcrypt('password'),
                'role_id' => 3,
                'doctor' => rand(1, 100),
                'surname' => Str::random(10),
                'img' => "nAo34XzMNvzHX7w3wgaR5tKEdXVPlf002kfNMj1s.png",
                'password' => bcrypt("Aa123456"),
                'birthday' => Carbon::now(),
                'address' => Str::random(10),
                'city' => Str::random(10),
                'state' => Str::random(10),
                'postal' => Str::random(10),
                'phone_number' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
