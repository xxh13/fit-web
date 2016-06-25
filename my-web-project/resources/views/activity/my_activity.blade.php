@extends('util.main')

@section('css')
    <link rel="stylesheet" href={{URL::asset("/css/activity/my_activity.css")}}>
@endsection()

@section('title', '我的活动')

@section('content')
    <section class="container-header">
        <h1>活动中心
            <small>我的活动</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="fa fa-home"></i>
                    主页
                </a>
            </li>
            <i class="fa fa-angle-right"></i>
            <li class="active">
                活动中心
            </li>
        </ol>
    </section>
    <section class="container-body">
        @if(sizeof($activity) == 0)
            <h2>
                你还没有参与任何活动，快去活动吧
            </h2>
        @else
            <section class="table-container">
                <div class="table-container-header pull-right">
                    <ul class="pagination pagination-sm inline">
                        <li>
                            <a href="#">上一页</a>
                        </li>
                        <li>
                            <a href="#">
                                当前页：1
                            </a>
                        </li>
                        <li>
                            <a href="#">下一页</a>
                        </li>
                    </ul>
                </div>
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <td>编号</td>
                            <td>类型</td>
                            <td>主题</td>
                            <td>结束时间</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<sizeof($activity);++$i)
                            <tr>
                                <td>{{$activity[$i]['activity_id']}}</td>
                                <td>{{$activity[$i]['type']}}</td>
                                <td>{{$activity[$i]['title']}}</td>
                                <td>{{$activity[$i]['end_time']}}</td>
                                <td class="info-button">
                                    <a href={{ '/activity/info/'.$activity[$i]['activity_id'] }}>
                                        <button class="btn btn-info">详细情况</button>
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </section>
        @endif
    </section>
@endsection