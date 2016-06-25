<?php

namespace App\Http\Controllers;

require_once '../Excel/Classes/PHPExcel.php';

use App\Advice;
use App\advice_like;
use App\advice_unlike;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdviceController extends Controller
{

    /**
     * 导入xml或者xml格式的文件
     * 解析将数据储存如数据库
     * @return \Illuminate\Http\Response
     */
    public function postImportFile(Request $request)
    {
        $data = [];
        $accountId = $request->session()->get('id');
        $extension = $request->file('advice')->getClientOriginalExtension();
        $temp_name = $_FILES['advice']['tmp_name'];
        if($extension=='xlsx'){
            $data = AdviceController::importXlsFile($temp_name);
        }elseif($extension== 'xml'){
            $data = AdviceController::importXmlFile($temp_name);
        }
        for($i=0;$i<sizeof($data);$i++){
            $advice = new Advice();
            $advice->authorId = $accountId;
            $advice->content = $data[$i]['content'];
            $advice->save();
        }
//        return $data;
        return redirect()->intended('/advice/my_advice');
    }

    /*
     * 导入xml格式的文件
     * */
    public function importXmlFile($path){
        $data = [];
        $xmlDom = new \DOMDocument();
        $xmlDom->load($path);
        $advices = $xmlDom->getElementsByTagName('advice');
        for($i=0;$i<$advices->length;$i++){
            $data[$i]['content'] = $advices[$i]->getElementsByTagName('content')->item(0)->nodeValue;
        }
        return $data;
    }

    /*
     * 导入excel格式的文件
     * */
    public function importXlsFile($path){
        $data = [];
        $i = 0;
        $objPHPExcel = \PHPExcel_IOFactory::load($path);
        $objPHPExcel->setActiveSheetIndex(0);
        $objWorkSheet = $objPHPExcel->getActiveSheet();
        foreach($objWorkSheet->getRowIterator() as $row){
            $cellIterator = $row->getCellIterator();
            foreach($cellIterator as $cell){
                $data[$i]['content'] = $cell->getValue();
            }
            $i++;
        }
        return $data;
    }

    public function getHome(Request $request, $page=1){
        $id = $request->session()->get('id');
        $profession = User::where('id',$id)->first()['profession'];
        $isCommonUser = ($profession=='Common User')?true:false;
        $name = $request->session()->get('name');
        $advices = Advice::orderBy('created_at','desc')->get()->toArray();
        if($page < 0){
            $page = 1;
        }
        if(($page-1)*8 > sizeof($advices)){
            $page = 1;
        }
        $advices_to_return = array_splice($advices , ($page-1)*8 , 8);
        for($i=0;$i<sizeof($advices_to_return);$i++){
            $advices_to_return[$i]['name'] =
                User::where('id',$advices_to_return[$i]['authorId'])->first()['name'];
            $advices_to_return[$i]['profession'] =
                User::where('id',$advices_to_return[$i]['authorId'])->first()['profession'];
            $advices_to_return[$i]['like'] =
                sizeof(advice_like::where('advice_id',$advices_to_return[$i]['id'])->get());
            $advices_to_return[$i]['unlike'] =
                sizeof(advice_unlike::where('advice_id',$advices_to_return[$i]['id'])->get());
        }

        $current_page = $page;
        $data = ['id'=>$id,'name'=>$name,'advice'=>$advices_to_return,
                    'page'=>$current_page,'isCommonUser'=>$isCommonUser];
        return view('advice.home',$data);
    }

    //医生或者教练发布建议
    public function postCreateAdvice(Request $request){
        $accountId = $request->session()->get('id');
        $content = $request->all()['advice'];

        $advice = new Advice();
        $advice->authorId = $accountId;
        $advice->content = $content;
        $advice->save();
        return redirect()->intended('/advice/home');
    }


    //对点赞的用户行为的处理
    public function getLike(Request $request,$page,$id){
        $advice_id = $id;
        $user_id = $request->session()->get('id');
        if(sizeof(advice_like::where(['advice_id'=>$advice_id,'user_id'=>$user_id])->get()) > 0){
            return redirect()->intended('/advice/home/'.$page);
        }

        if(sizeof(advice_unlike::where(['advice_id'=>$advice_id,'user_id'=>$user_id])->get()) > 0){
            return redirect()->intended('/advice/home/'.$page);
        }

        $advice_like = new advice_like();
        $advice_like->advice_id = $advice_id;
        $advice_like->user_id = $user_id;
        $advice_like->save();
        return redirect()->intended('/advice/home/'.$page);
    }

    //对不认同的用户行为点赞
    public function getUnlike(Request $request,$page,$id){
        $advice_id = $id;
        $user_id = $request->session()->get('id');
        if(sizeof(advice_like::where(['advice_id'=>$advice_id,'user_id'=>$user_id])->get()) > 0){
            return redirect()->intended('/advice/home/'.$page);
        }

        if(sizeof(advice_unlike::where(['advice_id'=>$advice_id,'user_id'=>$user_id])->get()) > 0){
            return redirect()->intended('/advice/home/'.$page);
        }

        $advice_unlike = new advice_unlike();
        $advice_unlike->advice_id = $advice_id;
        $advice_unlike->user_id = $user_id;
        $advice_unlike->save();
        return redirect()->intended('/advice/home/'.$page);
    }

    //用户获取自己发表的意见的页面方法
    public function getMyAdvice(Request $request){
        $accountId = $request->session()->get('id');
        $name = $request->session()->get('name');
        $advice = Advice::where('authorId',$accountId)->orderBy('created_at','desc')->get()->toArray();
        for($i=0;$i<sizeof($advice);$i++){
            $advice_id = $advice[$i]['id'];
            $advice[$i]['like'] = sizeof(advice_like::where('advice_id',$advice_id)->get());
            $advice[$i]['unlike'] = sizeof(advice_unlike::where('advice_id',$advice_id)->get());
        }
        $data = ['id'=>$accountId,'name'=>$name,'advice'=>$advice];
        return view('advice.my_advice',$data);
    }

    //用户删除自己发表的意见的方法
    public function getDeleteAdvice(Request $request,$id){
        $advice_id = $id;
        Advice::where('id',$advice_id)->delete();
        advice_like::where('advice_id',$advice_id)->delete();
        advice_unlike::where('advice_id',$advice_id)->delete();
        return redirect()->intended('/advice/my_advice');
    }
}
