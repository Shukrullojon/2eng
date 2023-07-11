<?php

namespace App\Traits;

use App\Models\Part;

trait PartTrait{

    public function store(Request $request){
        Part::create([
            'day_id' => $request->day_id,
            'model' => $request->model,

        ]);
    }
}
