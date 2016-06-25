<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHealthHome(Request $request)
    {
        $accountId = $request->session()->get('id');
        $name = User::where('id',$accountId)->first()['name'];
        $last_week = date('Y-m-d H:i:s',time()-200*24*60*60);
        $steps_from_start= Data::where('user_id',$accountId)->sum('steps');
        $start_date = Data::orderBy('created_at','asc')->get()[0]->created_at;
        $day_gap =(int) ((time()- strtotime($start_date))/(60*60*24));
        $road_length = (int)($steps_from_start*0.54/1000);
        $cal = (int)($steps_from_start * 0.04);

        //算出本周的运动量
        $data_week_filter = DB::table('data')->where('created_at','>',$last_week)->get();

        $data_week = [];
        for($i=0;$i<sizeof($data_week_filter);$i++){
            if($data_week_filter[$i]->user_id == $accountId){
                array_push($data_week,$data_week_filter[$i]);
            }
        }


        $sbp_all = 0;
        $dbp_all = 0;
        $heart_rate_all = 0;
        $steps_all = 0;
        $sleep_time_all = 0;
        for($i=0;$i<sizeof($data_week);$i++){
            $sbp_all += $data_week[$i]->sbp;
            $dbp_all += $data_week[$i]->dbp;
            $heart_rate_all += $data_week[$i]->heart_rate;
            $steps_all += $data_week[$i]->steps;
            $sleep_time_all += $data_week[$i]->sleep_time;
        }


        $sbp_avg = (int)($sbp_all/sizeof(($data_week)));
        $dbp_avg = (int)($dbp_all/sizeof(($data_week)));
        $heart_rate_avg = (int)($heart_rate_all/sizeof(($data_week)));
        $steps_avg = (int)($steps_all/sizeof($data_week));
        $sleep_time_avg =round( ($sleep_time_all/sizeof($data_week)/60),2);
        $cal_avg = (int) ($steps_avg*0.04);

        $data = ['id'=>$accountId,'name'=>$name,
                    'step'=>$steps_avg,'sleep_time'=>$sleep_time_avg,'cal'=>$cal,
                    'distance'=>$road_length,'gap'=>$day_gap,'cal_avg'=>$cal_avg,
                    'sbp'=>$sbp_avg,'dbp'=>$dbp_avg,'heart_rate'=>$heart_rate_avg];
        return view('health.home',$data);
    }


}