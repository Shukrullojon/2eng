<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property string $word
 * @property string $translate
 * @property string $info
 * @property string $audio
 */

class Vocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularies';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
