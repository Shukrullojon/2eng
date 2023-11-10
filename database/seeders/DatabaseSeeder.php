<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(VocabularySeeder::class);
        $this->call(UserPointSeeder::class);
    }
}
