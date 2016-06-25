<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advice';

    /**
     * The attributes that are mass assignable.
     * 批量插入作者，内容
     *
     * @var array
     */
    protected $fillable = ['authorId', 'content'];

}
