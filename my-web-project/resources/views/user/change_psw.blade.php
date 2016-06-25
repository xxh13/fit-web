<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('css/user/change_psw.css')}}">
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{URL::asset('https://ajax.googleapis.com/ajax/lib/jquery/1.11.3/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <title></title>
</head>
<body background="{{ URL::asset('/image/bg.jpg') }}">
<div class="home_header">
    <div class="web-menu">
        <ul>
            <li class="li">
                <a href="/user/home">首页</a>
            </li>
            <li class="li">
                <a href="/health/home">健康管理</a>
            </li>
            <li class="li">
                <a href="/activity/all">热门活动</a>
            </li>
            <li class="li">
                <a href="/advice/home">运动建议</a>
            </li>
        </ul>
    </div>
    <div class="home-user">
        <div class="home-user-content">
            <div class="btn-group" role="group" aria-label="..">
                <a href="/user/info">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-cog"></span>
                    </button>
                </a>
                <a href="/auth/logout">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="height: 20px"></div>
    <div class="row">
        <div class="col-sm-4" style="text-align: center">
            <div class="header-info" style="font-weight: bold">
                <h2 style="font-weight: bold">个人设置</h2>
            </div>
            <div class="btn-group-vertical">
                <a href="/user/info">
                    <button type="button" class="btn btn-primary-outline btn-lg">
                        <span class="glyphicon glyphicon-erase"></span>
                        基本信息
                    </button>
                </a>
                <a href="/user/upload_portrait">
                    <button type="button" class="btn btn-primary-outline btn-lg">
                        <span class="glyphicon glyphicon-user"></span>
                        设置头像
                    </button>
                </a>
                <a href="">
                    <button type="button" class="btn btn-primary-outline btn-lg">
                        <span class="glyphicon glyphicon-heart"></span>
                        我的配件
                    </button>
                </a>
                <a href="">
                    <button type="button" class="btn btn-primary-outline btn-lg">
                        <span class="glyphicon glyphicon-lock"></span>
                        账号安全
                    </button>
                </a>
            </div>
        </div>
        <div class="col-sm-6">
            <div style="border-bottom: 1px solid #cccccc">
                <h2 style="font-weight: bold">安全设置</h2>
            </div>
            <div>
                <div class="blank5"></div>
                <div class="blank10"></div>
                <h3>密码重置</h3>
                <div class="blank20"></div>
                <form action="/password/reset" method="post">
                    {{ csrf_field() }}
                    <div>
                        <label class="form-group">当前密码</label>
                        <input type="password" class="form-control" name="password_old">
                    </div>
                    <div class="blank20"></div>
                    <div>
                        <label class="form-group">新密码</label>
                        <input type="password" class="form-control" name="password_new">
                    </div>
                    <div class="blank20"></div>
                    <div style="height: 10px"></div>
                    <div style="text-align: center">
                        <button class="btn btn-info" type="submit">提交</button>
                    </div>
                    <div>
                        <p><label style="color: #ff0000">{{ isset($error)?$error:'' }}</label></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer><p>THANKS FOR VISITING</p></footer>
</body>
</html>