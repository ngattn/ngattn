<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBackUser extends Model
{
    protected $table = 'feedbackusers';

    protected $fillable = ['title', 'content', 'status'];
}
