<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'User_Activity';

    /**
     * The attributes that are mass assignable.
     * 批量插入字段 姓名，邮件，密码，类别职业（用户，医生，教练，管理员）
     *
     * @var array
     */
    protected $fillable = ['activity_id', 'user_id'];
}
