<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property string $text
 * @property string $video
 * @property string $audio
 */

class ListeningRepeat extends Model
{
    use HasFactory;

    protected $table = 'listening_repeat';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
