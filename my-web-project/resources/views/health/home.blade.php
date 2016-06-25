<?php
?>

@extends('util.main')

@section('css')
{{--<link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}">--}}
{{--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
<link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/css/daterangepicker-bs3.css">
{{--<script src="/dist/js/modernizr.custom.js"></script>.--}}
<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/component.css" />
@endsection

@section('title', '数据中心')

@section('content')
    <section class="content">
        {{--运动情况--}}
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>前53<sup style="font-size: 20px">%</sup></h3>

                        <p>运动量排名</p>
                    </div>
                    <div class="icon" style="top: 10px">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                    <a href="#rank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>15.6<sup style="font-size: 20px">Km</sup></h3>

                        <p>跑步距离</p>
                    </div>
                    <div class="icon"  style="top: 10px">
                        <i class="fa fa-street-view"></i>
                    </div>
                    <a href="#histogramChart3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>115/75</h3>

                        <p>今日血压</p>
                    </div>
                    <div class="icon" style="top: 10px">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <a href="#histogramChart" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>75<sup style="font-size: 20px">/min</sup></h3>

                        <p>今日心率</p>
                    </div>
                    <div class="icon" style="top: 10px">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                    <a href="#histogramChart2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        {{--@yield('content')--}}

        <div class="row">
            <div class="main col-lg-5" style="">
                <ul class="cbp_tmtimeline">
                    <li>
                        <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>4/10/13</span><span>18:30</span></time>
                        <div class="cbp_tmicon cbp_tmicon-phone"></div>
                        <div class="cbp_tmlabel">
                            <h3>静坐1.3小时</h3>
                            {{--<p>静坐100%   |   活动0%</p>--}}
                            {{--<p>大卡0 | 步数0</p>--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <p>静坐 100%</p>
                                    <p>大卡 0</p>
                                </div>
                                <div class="col-md-6">
                                    <p>活动 0%</p>
                                    <p>步数 0</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2013-04-11T12:04"><span>4/11/13</span><span>12:04</span></time>
                        <div class="cbp_tmicon cbp_tmicon-screen"></div>
                        <div class="cbp_tmlabel" style="background-color: #ffd230">
                            <h3>运动1.1小时</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>大卡 558.3</p>
                                    <p>距离 5Km</p>
                                </div>
                                <div class="col-md-6">
                                    <p>步数 5027</p>
                                    <p>速度4.5Km/h</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2013-04-13 05:36"><span>4/13/13</span><span>05:36</span></time>
                        <div class="cbp_tmicon cbp_tmicon-mail"></div>
                        <div class="cbp_tmlabel">
                            <h3>静坐2.7小时</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>静坐 97%</p>
                                    <p>大卡 0.6</p>
                                </div>
                                <div class="col-md-6">
                                    <p>活动 3%</p>
                                    <p>步数 125</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div style="min-height: 20px"></div>
                <div id="rank" style="font-size: 22px;font-family:'MicrosoftYaHei';font-weight: bolder;color: black!important;margin-bottom: 10px">今日目标</div>
                <div id="histogramChart4" style="width: 500px;height:600px;left: -55%"></div>
            </div>

        </div>

        <div style="background-color: #fff;box-shadow: 0 2px 5px rgba(1,1,1,0.3);padding: 10px;width: 95%">
            <div style="margin:5% 0 0 10%">
                <div id="histogramChart" style="width: 720px;height:500px;"></div>
                <div style="min-height: 50px"></div>
                <div id="histogramChart2" style="width: 720px;height:500px;"></div>
                <div style="min-height: 50px"></div>
                <div id="histogramChart3" style="width: 720px;height:500px;"></div>
            </div>

        </div>

        <!-- Slimscroll -->
        <script src="/dist/js/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/dist/js/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        {{--<script src="/dist/js/app.min.js"></script>--}}
        <!-- AdminLTE for demo purposes -->
        <script src="/dist/js/demo.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="/dist/js/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/dist/js/bootstrap-datepicker.js"></script>

        <script src="/dist/js/echarts.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        {{--<script src="/dist/js/bootstrap3-wysihtml5.all.min.js"></script>--}}
        <script>
            var histogramChart = echarts.init(document.getElementById('histogramChart'));
            histogramChart.setOption({
                title: {
                    text: '最近一周血压变化',
                    textStyle:{
                        color:'#000'
                    }
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data:['收缩压','舒张压']
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {},
                        dataView: {readOnly: false},
                        magicType: {type: ['line', 'bar']},
                        restore: {},
                        saveAsImage: {}
                    }
                },
                xAxis:  {
                    type: 'category',
                    boundaryGap: false,
                    data: ['周一','周二','周三','周四','周五','周六','周日']
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value} mmHg'
                    }
                },
                series: [
                    {
                        name:'收缩压',
                        type:'line',
                        data:[132, 135, 131, 136, 132, 134, 137],
                        markPoint: {
                            data: [
                                {type: 'max', name: '最大值'},
                                {type: 'min', name: '最小值'}
                            ]
                        },
                        markLine: {
                            data: [
                                {
                                    name: '收缩压警戒值,高于此值危险',
                                    yAxis: 140
                                }
                            ],
                            lineStyle:{
                                normal:{
                                    color:'rgb(255, 163, 61)',
                                    type:'solid'

                                }
                            }
                        }
                    },
                    {
                        name:'舒张压',
                        type:'line',
                        data:[86, 89, 87, 83, 87, 84, 88],
                        markPoint: {
                            data: [
                                {type: 'max', name: '最大值'},
                                {type: 'min', name: '最小值'}
                            ]
                        },
                        markLine: {
                            data: [
                                {
                                    name: '舒张压警戒值，高于此值危险',
                                    yAxis: 90
                                }
                            ],
                            lineStyle:{
                                normal:{
                                    color:'rgb(255, 163, 61)',
                                    type:'solid'

                                }
                            }
                        }
                    }
                ]
            });

            var d1=[];
            var d2=[];
            for(var i=23;i<=24;i++){
                for(var j=1;j<60;j++){
                    d1.push(i+":"+j);
                    d2.push(Math.round(75+10*Math.random()));
                }
            }
            for(var i=1;i<=6;i++){
                for(var j=1;j<60;j++){
                    d1.push(i+":"+j);
                    d2.push(Math.round(75+10*Math.random()));
                }
            }
            var histogramChart2 = echarts.init(document.getElementById('histogramChart2'));
            histogramChart2.setOption({
                title: {
                    text: '最近24小时睡眠时每分钟心率变化',
                    textStyle:{
                        color:'#000'
                    }
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data:['心率']
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {},
                        dataView: {readOnly: false},
                        magicType: {type: ['line', 'bar']},
                        restore: {},
                        saveAsImage: {}
                    }
                },
                xAxis:  {
                    type: 'category',
                    boundaryGap: false,
                    data:d1
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}/min'
                    }
                },
                series: [
                    {
                        name:'心率',
                        type:'line',
                        data:d2,
                        markLine: {
                            data: [
                                {type: 'average', name: '平均值'}
                            ],
                            lineStyle:{
                                normal:{
                                    color:'rgb(75, 123, 255)',
                                    type:'solid',
                                    width:5
                                }
                            }
                        }
                    }
                ]
            });

            var xAxisData=[];
            var data1=[];
            for(var i=1;i<=30;i++){
                data1.push(Math.round(2+5*Math.random()));
                xAxisData.push(i);
            }
            var histogramChart3 = echarts.init(document.getElementById('histogramChart3'));
            histogramChart3.setOption({
                title: {
                    text: '最近一个月每日跑步里程',
                    textStyle:{
                        color:'#000'
                    }
                },
                legend: {
                    data: ['跑步公里数'],
                    align: 'left'
                },
                toolbox: {
                    // y: 'bottom',
                    feature: {
                        magicType: {
                            type: ['stack', 'tiled']
                        },
                        dataView: {},
                        saveAsImage: {
                            pixelRatio: 2
                        }
                    }
                },
                tooltip: {},
                xAxis: {
                    data: xAxisData,
                    silent: false,
                    splitLine: {
                        show: false
                    }
                },
                yAxis: {
                },
                series: [{
                    name: '跑步公里数',
                    type: 'bar',
                    data: data1,
                    animationDelay: function (idx) {
                        return idx * 10;
                    }
                }],
                animationEasing: 'elasticOut',
                animationDelayUpdate: function (idx) {
                    return idx * 5;
                }
            });

            var histogramChart4 = echarts.init(document.getElementById('histogramChart4'));
            histogramChart4.setOption({
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c}%"
                },
                legend: {
                    data: ['慢跑5km','引体向上*30','仰卧起坐*200','俯卧撑*50','慢跑3km']
                },
                series: [
                    {
                        name: '目标',
                        type: 'funnel',
                        left: '10%',
                        width: '80%',
                        label: {
                            normal: {
                                formatter: '{b}目标'
                            },
                            emphasis: {
                                position:'inside',
                                formatter: '{b}目标: {c}%'
                            }
                        },
                        labelLine: {
                            normal: {
                                show: false
                            }
                        },
                        itemStyle: {
                            normal: {
                                opacity: 0.7
                            }
                        },
                        data: [
                            {value: 60, name: '慢跑5km'},
                            {value: 40, name: '引体向上*30'},
                            {value: 20, name: '仰卧起坐*200'},
                            {value: 80, name: '俯卧撑*50'},
                            {value: 100, name: '慢跑3km'}
                        ]
                    },
                    {
                        name: '已完成',
                        type: 'funnel',
                        left: '10%',
                        width: '80%',
                        maxSize: '80%',
                        label: {
                            normal: {
                                position: 'inside',
                                formatter: '{c}%',
                                textStyle: {
                                    color: '#fff'
                                }
                            },
                            emphasis: {
                                position:'inside',
                                formatter: '{b}已完成: {c}%'
                            }
                        },
                        itemStyle: {
                            normal: {
                                opacity: 0.5,
                                borderColor: '#fff',
                                borderWidth: 2
                            }
                        },
                        data: [
                            {value: 30, name: '慢跑5km'},
                            {value: 10, name: '引体向上*30'},
                            {value: 5, name: '仰卧起坐*200'},
                            {value: 50, name: '俯卧撑*50'},
                            {value: 80, name: '慢跑3km'}
                        ]
                    }
                ]
            });

        </script>
    </section>
    <style>
        .main-header>.logo{
            width: 250px;
        }
        .nav>li>a:hover , .nav>li>a:focus{
            background: rgba(0,0,0,0.1);
            color: #f6f6f6;
        }

        .nav>li.open>a:focus, .nav>li.open>a:hover{
            background: rgba(0,0,0,0.1);
            color: #f6f6f6;
        }

    </style>
@endsection
