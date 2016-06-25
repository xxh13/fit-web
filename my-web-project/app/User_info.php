<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{

    protected $table = 'users_info';

    /**
     * The attributes that are mass assignable.
     * 批量插入字段
     *
     * @var array
     */
    protected $fillable = ['user_id', 'gender', 'birth','hobby','sportsDeclaration'];
}
