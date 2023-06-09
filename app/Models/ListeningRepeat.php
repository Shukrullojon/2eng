<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningRepeat extends Model
{
    use HasFactory;

    protected $table = 'listening_repeat';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
