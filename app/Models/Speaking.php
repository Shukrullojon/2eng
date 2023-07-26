<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property string $theme
 * @property string $example
 */

class Speaking extends Model
{
    use HasFactory;

    protected $table = 'speaking';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
