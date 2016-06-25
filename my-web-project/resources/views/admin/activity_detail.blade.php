<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href={{ URL::asset('css/admin/activity_detail.css') }}>
        <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
        <script src="{{URL::asset('https://ajax.googleapis.com/ajax/lib/jquery/1.11.3/jquery.min.js')}}"></script>
        <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <title>welcome</title>
    </head>
    <body background="{{ URL::asset('/image/bg.jpg') }}">
        <div class="head"><label class="head">活动资料卡</label></div>
        <div class="row">
            <div class="col-sm-3 div_right_border">
                <h2>活动发起者</h2>
                <div class="img_container">
                    <img class="img-circle my_img" src={{ URL::asset('../image/portrait/'.$activity['author_id'].'.jpg') }}>
                </div>
                <div class="text-container">
                    <label class="my_name">{{ $author_name }}</label>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="row"><h2>详细信息</h2></div>
                <div class="div_bottom_border"></div>
                <div class="blank10"></div>
                <div class="info_container">
                    <div class="info">活动主题：{{ $activity['title'] }}</div>
                    <div class="info">活动类型：{{ $activity['type'] }}</div>
                    <div class="info">活动内容：{{ $activity['content'] }}</div>
                    <div class="info">开始时间：{{ $activity['start_time'] }}</div>
                    <div class="info">结束时间：{{ $activity['end_time'] }}</div>
                    <div class="info">创建时间：{{ $activity['created_at'] }}</div>
                </div>
                <div class="blank10"></div>
                <div class="active_container">
                    <h2>共{{ $count }}人参与</h2>
                    <div class="div_bottom_border"></div>
                    @for($i=0;$i<sizeof($user_activity);$i++)
                        <div class="participator">
                            <span class="my_img">
                                <img class="my_img img-circle" src={{ URL::asset('../image/portrait/'.$user_activity[$i]['user_id'].'.jpg') }}>
                            </span>
                            <span class="my_name">
                                <label class="participator_name">{{ $user_activity[$i]['name'] }}</label>
                            </span>
                        </div>
                    @endfor
                </div>
                <div class="blank10"></div>
                <div class="row my_btn">
                    <a href="/admin/home_activity">
                        <button class="btn btn-info btn-lg">活动管理首页</button>
                    </a>
                    <a href="/auth/logout">
                        <button class="btn btn-primary btn-lg">退出</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>