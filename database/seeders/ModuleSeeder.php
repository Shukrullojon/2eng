<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            [
                'name' => '1 - module',
            ],
            [
                'name' => '2 - module',
            ],
            [
                'name' => '3 - module',
            ],
            [
                'name' => '4 - module',
            ],
            [
                'name' => '5 - module',
            ],
            [
                'name' => '6 - module',
            ],
        ];

        foreach ($lists as $list){
            Module::create($list);
        }
    }
}
