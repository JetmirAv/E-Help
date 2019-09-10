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
        $adminEmail = ['doctor1@mail.com', 'doctor2@mail.com','doctor3@mail.com','doctor4@mail.com'];
        for ($i = 0; $i < 4; $i++) {
            DB::table('users')->insert([
                'name' => "Doctor" . ($i + 1),
                'email' => $adminEmail[$i],
                'password' => bcrypt('password'),
                'role_id' => 2,
                'doctor' => null,
                'surname' => "Test" . $i,
                'img' => "nAo34XzMNvzHX7w3wgaR5tKEdXVPlf002kfNMj1s.png",
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
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => "Patient" . ($i + 1),
                'email' => patient . $i . '@mail.com',
                'role_id' => 3,
                'doctor' => rand(1, 4),
                'surname' => "Test" . $i,
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
