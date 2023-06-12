<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartResult extends Model
{
    use HasFactory;

    protected $table = 'part_results';

    protected $guarded = [];

    public function part(){
        return $this->belongsTo(Part::class);
    }
}
