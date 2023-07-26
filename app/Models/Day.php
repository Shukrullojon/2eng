<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $module_id
 * @property string $name
 */

class Day extends Model
{
    use HasFactory;

    protected $table = 'days';

    protected $guarded = [];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
