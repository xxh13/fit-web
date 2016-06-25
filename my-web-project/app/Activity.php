<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    /**
     * The attributes that are mass assignable.
     * 批量插入字段
     *
     * @var array
     */
    protected $fillable = ['author_id', 'title','type', 'content','start_time','end_time'];

}
