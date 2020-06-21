<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    public $fillable = ['content'];

    public $table = 'introduces';
}
