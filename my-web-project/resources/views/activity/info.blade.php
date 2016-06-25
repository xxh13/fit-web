@extends('util.main')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('/css/activity/info.css')}}">
@endsection

@section('title', '活动详情')


@section('content')
    <section class="container-header">
        <h1>活动中心
            <small>活动详情</small>
        </h1>
        <ol class="breadcrumb">
            <li>
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
        <div class="info-panel">
            <div class="info-panel-header">
                <h1>
                    <small>活动信息</small>
                </h1>
            </div>
            <div class="info-panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <label class="info-tag">&nbsp;活动主题:</label>
                        <label class="title-info">{{$title}}</label>
                    </li>

                    <li class="list-group-item">
                        <label class="info-tag">&nbsp;活动类型:</label>
                        <label class="info-body">{{$type}}</label>
                    </li>
                    <li class="list-group-item">
                        <label class="info-tag">活动发起人:</label>
                        <label class="info-body">{{$author}}</label>
                    </li>
                    <li class="list-group-item">
                        <label class="info-tag">&nbsp;活动说明:</label>
                        <label class="info-body">{{$content}}</label>
                    </li>
                    <li class="list-group-item">
                        <label class="info-tag">&nbsp;活动时间:</label>
                        <span class="start-time">{{$start_time}}</span>
                        <span>--</span>
                        <span class="end-time">{{$end_time}}</span>
                    </li>
                </ul>
            </div>
            <div class="info-panel-footer">
                @if(!$isMember)
                    <a href="/activity/getIn/{{$activityId}}">
                        <button class="btn btn-info btn-lg my-btn">参加</button>
                    </a>
                @else
                    <a href="/activity/cancel/{{$activityId}}">
                        <button class="btn btn-info btn-lg my-btn">退出</button>
                    </a>
                @endif
            </div>
        </div>
        <div class="participator-panel">
            <div class="participator-panel-header">
                <h1>
                    <small>参与用户</small>
                </h1>
            </div>
            <div class="participator-panel-body">
                <ul class="list-group">
                    @for($i=0; $i<sizeof($participator); ++$i)
                        <li class="list-group-item">
                            <img src="/image/portrait/{{$participator[$i]['user_id']}}.jpg" class="img-circle">
                            <span>{{$participator[$i]['name']}}</span>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </section>
@endsection