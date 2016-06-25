<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ URL::asset('css/admin/user_detail.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
        <script src="{{URL::asset('https://ajax.googleapis.com/ajax/lib/jquery/1.11.3/jquery.min.js')}}"></script>
        <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <title></title>
    </head>
    <body background="{{ URL::asset('/image/bg.jpg') }}">
        <div class="head">
            <label class="head">用户资料卡</label>
        </div>
        <div class="row">
            <div class="col-sm-3 div_right_border">
                <h2>头像</h2>
                <div class="img_container">
                    <img class="img-circle my_img" src={{ URL::asset('../image/portrait/'.$user['id'].'.jpg') }}>
                </div>
            </div>
            <div class="col-sm-7">
                <h2>详细资料</h2>
                <div class="row user_panel">
                    <div class="info">用户昵称：{{ $user['name'] }}</div>
                    <div class="info">注册邮箱：{{ $user['email'] }}</div>
                    <div class="info">职业类别：{{ $user['profession'] }}</div>
                    <div class="info">用户性别：{{ $user['gender'] }}</div>
                    <div class="info">出生日期：{{ $user['birth'] }}</div>
                    <div class="info">兴趣爱好：{{ $user['hobby'] }}</div>
                    <div class="info">加入时间：{{ $user['created_at'] }}</div>
                </div>
                <div class="blank40"></div>
                <div class="row my_btn_group">
                    <div class="btn-group">
                        <a href="/admin/home_user">
                            <button class="btn btn-info btn-lg">用户管理首页</button>
                        </a>
                        <a href="/auth/logout">
                            <button class="btn btn-primary btn-lg">退出</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
