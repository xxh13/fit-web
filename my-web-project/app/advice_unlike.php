<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advice_unlike extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advice_unlike';

    /**
     * The attributes that are mass assignable.
     * 批量插入
     *
     * @var array
     */
    protected $fillable = ['user_id','advice_id'];
}
