<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'languages';

    protected $fillable = [
        'user_id', 'title', 'description'
    ];
}
