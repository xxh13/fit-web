@extends('util.main')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('css/activity/create.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/datetime/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('js')
    <script type="text/javascript"  src={{URL::asset("js/datetime/bootstrap-datetimepicker.min.js")}}></script>
@endsection

@section('title', '创建活动')

@section('content')
    <section class="container-header">
        <h1>活动中心
            <small>创建活动</small>
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

        <div class="box box-info">
            <div class="box-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="form-inline" for="title">主题</label>
                        <input class="form-control" type="text" name="title" id="title" required="true">
                    </div>
                    <div class="form-group">
                        <label class="form-inline" for="type">类型</label>
                        <select class="form-control">
                            <option>篮球</option>
                            <option>足球</option>
                            <option>跑步</option>
                            <option>健身</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="content-label">内容</label>
                        <textarea type="text" class="form-control content" name="content" id="content"> </textarea>
                    </div>
                    <div class="form-group">
                        <label>开始时间</label>
                        <div class="input-append date from-date" id="from-date">
                            <input class="form-control datepicker my-timepicker" id="start-time" required="true">
                            <span class="add-on">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>

                        <label class="end-time">结束时间</label>
                        <div class="input-append date to-date" id="to-date">
                            <input class="form-control datepicker my-timepicker" id="end-time" required="true">
                            <span class="add-on">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>

                    </div>

                    <div class="form-group my-btn-group">
                        <input type="button" class="btn btn-info my-sm-btn" value="撤销">
                        <input type="button" class="btn btn-info my-sm-btn" value="创建">
                    </div>
                </form>
            </div>
        </div>

    </section>

    <script type="text/javascript">
        $('#from-date').datetimepicker({
            format: 'MM/dd/yyyy hh:ii',
            language: 'en',
            pickDate: true,
            pickTime: true,
            hourStep: 1,
            minuteStep: 15,
            inputMask: true,
            autoclose: true
        });
        $('#to-date').datetimepicker({
            format: 'MM/dd/yyyy hh:ii',
            language: 'en',
            pickDate: true,
            pickTime: true,
            hourStep: 1,
            minuteStep: 5,
            inputMask: true,
            autoclose: true
        });
    </script>

@endsection