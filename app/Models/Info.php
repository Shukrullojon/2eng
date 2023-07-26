<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $description
 * @property string $image
 */

class Info extends Model
{
    use HasFactory;
    protected $table = 'infos';
    protected $guarded = [];
}
