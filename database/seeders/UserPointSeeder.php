<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Database\Seeder;

class UserPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $modules = Module::all();
        foreach ($users as $user){
            foreach ($modules as $module){
                UserPoint::create([
                    'model' => Module::class,
                    'model_id' => $module->id,
                    'user_id' => $user->id,
                    'status' => rand(0,1),
                    'point' => rand(0,1),
                ]);
            }
        }
    }
}
