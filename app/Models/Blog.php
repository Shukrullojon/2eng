<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property string $text
 * @property string $translate
 * @property string $grammer_focus
 */

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = [];

    /**
     * @return day relation.
     */
    public function day(){
        return $this->belongsTo(Day::class);
    }
}
