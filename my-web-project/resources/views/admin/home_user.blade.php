{{--管理员主页--}}
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href={{ URL::asset('css/admin/home.css') }}>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{URL::asset('https://ajax.googleapis.com/ajax/lib/jquery/1.11.3/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <title>welcome</title>
</head>
<body background="{{ URL::asset('/image/bg.jpg') }}">
    <div class="row body_head"></div>
        <div class="col-sm-2 div_right_border">
            <div class="blank50"></div>
            <div class="btn-group-vertical">
                <a href="/admin/home_user">
                    <button type="button" class="btn btn-info  btn-lg">用户管理</button>
                </a>
                <a href="/admin/home_activity">
                    <button type="button" class="btn btn-danger btn-lg">活动管理</button>
                </a>
                <a href="/auth/logout">
                    <button type="button" class="btn btn-primary btn-lg">退出登录</button>
                </a>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <h2>USER TABLES</h2>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <table>
                        <thead class="head">
                        <td class="head">Name</td>
                        <td class="head">email</td>
                        <td class="head">Type</td>
                        <td class="head"></td>
                        </thead>
                        @for($i=0;$i<sizeof($user);$i++)
                            <tr class="info">
                                <td class="info">{{ $user[$i]['name'] }}</td>
                                <td class="info">{{ $user[$i]['email'] }}</td>
                                <td class="info">{{ $user[$i]['profession'] }}</td>
                                <td class="info">
                                    <div class="btn-group">
                                        <form class="my_form" method="post" action={{ '/admin/del_user/'.$user[$i]['id'] }}>
                                           {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="删除">
                                        </form>
                                        <a href={{ '/admin/user_detail/'.$user[$i]['id'] }}>
                                            <button class="btn btn-info">资料</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
