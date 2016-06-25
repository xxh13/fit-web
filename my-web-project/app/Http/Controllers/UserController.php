<?php

namespace App\Http\Controllers;

use App\Data;
use App\mood;
use App\User;
use App\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

//    用户主页的界面
   public function getShowUserHome(Request $request){
       $userName = $request->session()->get('name','none');
       $userPortrait = $request->session()->get('id','user');

       $last_day = strtotime('Y-m-d H:m:s',time()-3*24*60*60);
       $sports_info_filter = DB::table('data')->where('created_at','>',$last_day)->get();
       $count = 0;
       $sports_info = new Data();
       for($i=0;$i<sizeof($sports_info_filter);$i++){
           if($sports_info_filter[$i]->id == $userPortrait){
               $sports_info = $sports_info_filter[$i];
           }
       }
       for($i=0;$i<sizeof($sports_info_filter);$i++){
           if($sports_info_filter[$i]->steps < $sports_info->steps){
               $count++;
           }
       }
        $count = round($count/sizeof($sports_info_filter)*100,2);

       $step = $sports_info->steps;
       $sleep_time = round($sports_info->sleep_time/60,2);

       $moods = mood::orderBy('created_at','desc')->get()->toarray();
       $moods_to_return = array_splice($moods,0,10);
       for($i=0;$i<sizeof($moods_to_return);$i++){
           $authorId = $moods_to_return[$i]['authorId'];
           $moods_to_return[$i]['name'] =
               User::where('id',$authorId)->first()['name'];
       }

       $data = ['userName'=>$userName,'userPortrait'=>$userPortrait,'moods'=>$moods_to_return,
                'step'=>$step,'sleep_time'=>$sleep_time,'count'=>$count];
       return view('user.home', $data);
   }

    //用户发表心情的post方法
    public function postCreateMood(Request $request){
        $authorId = $request->session()->get('id');
        $content = $request->all()['mood'];

        $mood = new mood();
        $mood->authorId = $authorId;
        $mood->content = $content;
        $mood->save();
        return redirect()->intended('/user/home');
    }

    //更换用户的头像get方法
    public function getUpload_portrait(Request $request){
        $userPortrait = $request->session()->get('id','user');
        return view('user.upload_portrait',['userPortrait'=>$userPortrait]);
    }

    //更换用户的头像的post方法
    public function postUpload_portrait(Request $request){
        $id = $request->session()->get('id');
        $extension = $request->file('portrait')->getClientOriginalExtension();

        $temp_name = $_FILES['portrait']['tmp_name'];
        move_uploaded_file($temp_name, "../public/image/portrait/$id".'.'.$extension);
        return redirect()->intended('/user/upload_portrait');
    }

    //用户信息的get方法
    public function getInfo(Request $request){
        $id = $request->session()->get('id');
        $userInfo = User_info::where('user_id',$id)->first();
        $name = User::where('id',$id)->first()['name'];
        $birth = $userInfo['birth'];
        $hobby = $userInfo['hobby'];
        $sports_tag = $userInfo['sportsDeclaration'];

        $data = ['name'=>$name,'birth'=>$birth,'hobby'=>$hobby,'sports_tag'=>$sports_tag];

        return view('user.info',$data);
    }

    //用户信息的post方法
    public function postInfo(Request $request){
        $id = $request->session()->get('id');
        $name = $request->all()['username'];
        $gender = $request->all()['gender'];
        $birth = $request->all()['birth'];
        $hobby = $request->all()['hobby'];
        $sports_declaration = $request->all()['sports-tag'];

        $data = ['name'=>$name,'gender'=>$gender,'birth'=>$birth,
                    'hobby'=>$hobby,'sports_tag'=>$sports_declaration];

//      更改用户昵称
        User::where('id',$id)->update(['name'=>$name]);

        $user_info = User_info::where('user_id',$id)->get();
        if(sizeof($user_info) != 0){
            User_info::where('user_id',$id)
                ->update([
                    'gender'=> $gender,
                    'birth'=> $birth,
                    'hobby'=>$hobby,
                    'sportsDeclaration'=>$sports_declaration
                ]);
        }else{
            $user_info = new User_info();
            $user_info->user_id = $id;
            $user_info->gender = $gender;
            $user_info->birth = $birth;
            $user_info->hobby = $hobby;
            $user_info->sportsDeclaration = $sports_declaration;
            $user_info->save();
        }
        return redirect()->intended('user/info');
    }

    //用户修改密码的get方法
    public function getChange_psw(Request $request){
        return view('user.change_psw');
    }


    //用户修改密码的post方法
    public function postChange_psw(Request $request){
        $email = $request->session()->get('email');
        $password_old = $request->all()['password_old'];
        $password_new = $request->all()['password_new'];
//        $password_confirmed = $request->all()['password_confirm'];
        $user = User::where('email',$email)->first();
        if(!Auth::attempt(['email'=>$email,'password'=>$password_old])){
            return view('user.change_psw',['error'=>'invalid password!']);
        }

        $user->password = bcrypt($password_new);
        $user->save();

        $userName = $request->session()->get('name','none');
        $userPortrait = $request->session()->get('id','user');
        return redirect()->intended('user/home');
    }
}
