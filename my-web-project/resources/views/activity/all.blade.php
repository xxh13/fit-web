

@extends('util.main')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('css/activity/all.css')}}">
@endsection

@section('title', '活动中心')

@section('content')
    <section class="container-header">
        <h1>活动中心
            <small>活动列表</small>
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
        <div class="box">
            <div class="box-header">
                <div class="box-tools pull-right">
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
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <td>编号</td>
                                <td>类别</td>
                                <td>主题</td>
                                <td>结束时间</td>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < sizeof($activity); ++$i)
                            <tr>
                                <td>
                                    <a href={{ '/activity/info/'.$activity[$i]['id'] }}>{{$activity[$i]['id']}}</a>
                                </td>
                                <td>
                                    {{$activity[$i]['type']}}
                                </td>
                                <td>
                                    {{$activity[$i]['title']}}
                                </td>
                                <td>
                                    {{$activity[$i]['end_time']}}
                                </td>
                                <td class="info-button">
                                    <a href={{ '/activity/info/'.$activity[$i]['id'] }}>
                                        <button class="btn btn-info">详细情况</button>
                                    </a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            {{--<div class="box-bottom">--}}
                {{--<div class=" btn-group button-container" role="group">--}}
                    {{--<a>--}}
                        {{--<button class="btn btn-info">已参与活动</button>--}}
                    {{--</a>--}}
                    {{--<a>--}}
                        {{--<button class="btn btn-info">发起新活动</button>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </section>
@endsection