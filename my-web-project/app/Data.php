<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = ['user_id','sbp','dbp','heart_rate','steps','sleep_time'];
}
