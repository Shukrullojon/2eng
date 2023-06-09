<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
    use HasFactory;

    protected $table = 'listening';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
