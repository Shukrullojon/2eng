<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $name
 * @property integer $image
 * @property integer $info
 */

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $guarded = [];

    public function days(){
        return $this->hasOne(Day::class);
    }
}
