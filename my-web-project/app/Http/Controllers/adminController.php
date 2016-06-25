<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\User_Activity;
use App\User_info;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class adminController extends Controller
{
    //admin界面的用户管理
    public function getAdminHome_User(Request $request){
        $user = User::all()->toArray();
        return view('admin.home_user',['user'=>$user]);
    }

    //管理员获取用户详细信息
    public function getAdmin_user_detail(Request $request,$id){
        $userId = $id;
        $user = User::where('id',$userId)->first();
        $userInfo = User_info::where('user_id',$userId)->first();

        $data = ['name'=>$user['name'],'email'=>$user['email'],'profession'=>$user['profession'],
                 'gender'=>$userInfo['gender'],'birth'=>$userInfo['birth'],
                 'hobby'=>$userInfo['hobby'],'created_at'=>$userInfo['created_at'],
                  'id'=>$userId];

        return view('admin.user_detail',['user'=>$data]);
    }

    //admin删除用户,删除用户账号的一切信息
    public function postDelUser(Request $request,$id){
        $userId = $id;
        User::where('id',$userId)->delete();
        User_info::where('user_id',$userId)->delete();
        User_Activity::where('user_id',$userId)->delete();
        return redirect()->intended('/admin/home_user');
    }


    //admin界面的活动管理
    public function getAdminHome_Activity(Request $request){
        $activity = Activity::all()->toArray();
        return view('admin.home_activity',['activity'=>$activity]);
    }

    //管理员获取活动的详细信息
    public function getAdmin_activity_detail(Request $request, $id){
        $activityId = $id;
        $activityInfo = Activity::where('id',$activityId)->first();
        $author_id = $activityInfo::where('id',$activityId)->first()['author_id'];
        $user_activity = User_Activity::where('activity_id',$activityId)->get();
        $author_name = User::where('id',$author_id)->first()['name'];
        $count = sizeof($user_activity);
        for($i=0;$i<sizeof($user_activity);$i++){
            $user_activity[$i]['name'] = User::where('id',$user_activity[$i]['user_id'])->first()['name'];
        }
        return view('admin.activity_detail',['activity'=>$activityInfo,'author_name'=>$author_name,
                                                'user_activity'=>$user_activity,
                                                 'count'=>$count]);
    }

    /*
     * 删除活动，并且删除活动的参与记录
     * */
    public  function postDelActivity(Request $request,$id){
        $activityId  = $id;
        Activity::where('id',$activityId)->delete();
        User_Activity::where('activity_id',$activityId)->delete();
        return redirect()->intended('/admin/home_activity');
    }
}
