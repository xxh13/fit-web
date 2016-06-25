<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\User_Activity;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //获取全部的活动的大概信息
    public function getActivity(Request $request , $page=1){
        $portrait = $request->session()->get('id');
        $name = $request->session()->get('name');

        //所有的活动的信息，再根据页面的信息选择显示的信息,每页显示8个元素
        $activity_all = Activity::orderBy('created_at','desc')->get()->toArray();

        if($page < 0){
            $page = 1;
        }

        if(($page-1)*8 >= sizeof($activity_all)){
            $page = 1;
        }

        $activity_need = array_reverse(array_splice($activity_all,($page-1)*8 , 8));
        $current_page = $page;

        $data = ['portrait'=>$portrait, 'name'=>$name, 'current_page'=>$current_page,'activity'=>$activity_need];
        return view('activity.all', $data);
    }

    //获取自己参加过的活动的页面
    public function getMyActivity(Request $request){
        $accountId = $request->session()->get('id');
        $name = User::where('id',$accountId)->first()['name'];
        $activity = User_Activity::where('user_id',$accountId)->orderBy('created_at','desc')->get()->toArray();
        for($i=0;$i<sizeof($activity);$i++){
            $activity_id = $activity[$i]['activity_id'];
            $activity[$i]['title'] = Activity::where('id',$activity_id)->first()['title'];
            $activity[$i]['type'] = Activity::where('id',$activity_id)->first()['type'];
            $activity[$i]['content'] = Activity::where('id',$activity_id)->first()['content'];
            $activity[$i]['end_time'] = Activity::where('id', $activity_id)->first()['end_time'];
        }
        $data = ['portrait'=>$accountId, 'name'=>$name,'activity'=>$activity,'id'=>$accountId];
        return view('activity.my_activity',$data);
    }

    //退出参加的活动的页面
    public function getCancelActivity(Request $request,$id){
        $activity_id = $id;
        $accountId = $request->session()->get('id');

        User_Activity::where(['activity_id'=>$activity_id,'user_id'=>$accountId])->delete();
        return redirect()->intended('/activity/my_activity');
    }


    //获取活动的详细信息
    public function getDetailInfo(Request $request, $id){
        $accountId = $request->session()->get('id');
        $accountName = $request->session()->get('name');
        $activityId = $id;
        $activityInfo = Activity::where('id',$activityId)->first();
        $author_id = $activityInfo['author_id'];
        $title = $activityInfo['title'];
        $type = $activityInfo['type'];
        $content = $activityInfo['content'];
        $start_time = $activityInfo['start_time'];
        $end_time = $activityInfo['end_time'];

        $authorName = User::where('id',$author_id)->first()['name'];

        $participator = User_Activity::where('activity_id',$activityId)->get()->toArray();
        $count = sizeof($participator);

        $isMember = false;
        for($i=0;$i<sizeof($participator);$i++){
            if($participator[$i]['user_id'] == $accountId){
                $isMember = true;
            }
            $tempName = User::where('id',$participator[$i]['user_id'])->first()['name'];
            $participator[$i]['name'] = $tempName;
        }

        $data = ['author'=>$authorName,'title'=>$title,'type'=>$type,'content'=>$content,'activityId'=>$activityId,
                 'start_time'=>$start_time, 'end_time'=>$end_time,'participator'=>$participator,
                 'accountId'=>$accountId,'accountName'=>$accountName,'count'=>$count, 'isMember'=>$isMember];
        return view('activity.info',$data);
    }

    //参加活动的post方法
    public function getInActivity(Request $request, $id){
        $activity_id = $id;
        $user_id = $request->session()->get('id');

        if(sizeof(User_Activity::where(['activity_id'=>$activity_id,'user_id'=>$user_id])->get()) > 0){
            return redirect()->intended('/activity/info/'.$activity_id);
        }

        $user_activity = new User_Activity();
        $user_activity->user_id = $user_id;
        $user_activity->activity_id = $activity_id;
        $user_activity->save();

        return redirect()->intended('/activity/info/'.$activity_id);
    }

    //获取活动创始页面的get方法
    public function getCreate(Request $request){
        $portrait = $request->session()->get('id');
        $name = $request->session()->get('name');
        $data = ['portrait'=>$portrait, 'name'=>$name];
        return view('activity.create',$data);
    }

    //活动创始页面的post方法
    public function postCreate(Request $request){
        $author_id = $request->session()->get('id');
        $title = $request->all()['title'];
        $type = $request->all()['type'];
        $content = $request->all()['content'];
        $start_time = $request->all()['start_time'];
        $end_time = $request->all()['end_time'];


        $activity = new Activity();
        $activity->author_id = $author_id;
        $activity->title = $title;
        $activity->type = $type;
        $activity->content = $content;
        $activity->start_time = $start_time;
        $activity->end_time = $end_time;

        $activity->save();

        return redirect()->intended('activity/create');
    }
}
