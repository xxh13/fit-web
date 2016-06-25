<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mood extends Model
{
    protected $table = 'mood';

    protected $fillable = ['authorId','content'];
}
