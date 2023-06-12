<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularies';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
