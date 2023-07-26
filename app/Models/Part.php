<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $day_id
 * @property string $model
 * @property integer $model_id
 * @property string $question
 * @property string $option_a
 * @property string $option_b
 * @property string $option_c
 * @property string $option_d
 * @property integer $answer
 * @property integer $status
 */

class Part extends Model
{
    use HasFactory;

    protected $table = 'parts';

    protected $guarded = [];

    public function day(){
        return $this->belongsTo(Day::class);
    }

    public function PartResult(){
        return $this->hasOne(PartResult::class);
    }
    public $answers = [
        '1' => 'A',
        '2' => 'B',
        '3' => 'C',
        '4' => 'D',
    ];

    public $st = [
        '1' => 'Active',
        '0' => 'No Active',
    ];
}
