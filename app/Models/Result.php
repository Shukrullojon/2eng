<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
