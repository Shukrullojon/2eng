<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Vocabulary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VocabularySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3000; $i++) {
            Vocabulary::create([
                'day_id' => Day::select('id')->inRandomOrder()->first()->id,
                'word' => Str::uuid(),
                'translate' => Str::uuid(),
                'info' => Str::uuid(),
                'audio' => 'abc',
            ]);
        }
    }
}
