<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property integer $text
 * @property integer $audio
 */
class Listening extends Model
{
    use HasFactory;

    protected $table = 'listening';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
