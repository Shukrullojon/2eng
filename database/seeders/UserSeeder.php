<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'SHUKRULLO',
                'email' => 'shukrullobk@gmail.com',
                'password' => Hash::make('123456789'),
                'theme' => 'default',
                'phone' => '993011798',
            ],
        ];
        foreach ($data as $d){
            User::create($d);
        }

        for ($i = 0; $i < 100; $i ++){
            User::create([
                'name' => 'User'.$i,
                'email' => "user{$i}@mail.com",
                'password' => Hash::make("user{$i}"),
                'theme' => 'default',
                'phone' => rand(100000000,999999999),
            ]);
        }
    }
}
