{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css')}}">--}}
    {{--<script src="{{ URL::asset('js/login.js')}}"></script>--}}
    {{--<title>登陆</title>--}}
{{--</head>--}}
{{--<body><!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<title>登陆</title>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="container">--}}
    {{--<form action="/auth/login" method="post" id="login">--}}
        {{--{!! csrf_field() !!}--}}
        {{--<div id="login_demo">--}}
                {{--<input id="email" name="email" required="required" type="email" value="{{ old('email') }}"--}}
                       {{--placeholder="your email">--}}
                {{--<input id="password" name="password" required="required" type="password" placeholder="your password">--}}
                {{--<input type="submit" value="Login">--}}
            {{--<p>--}}
                {{--not a member yet ?--}}
                {{--<button class="change_link"><a href="/auth/register">register</a></button>--}}
            {{--</p>--}}
            {{--<label id="error-log" style="color: red">{{ isset($error) ? $error : "" }}</label>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

{{--</body>--}}
{{--</html>--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Ease Project">
    <meta name="author" content="cristph">
    <link rel="icon" href="../../favicon.ico">

    <title>Ease Login</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
</head>

<body>
<div class="outer-wrapper">
    <div class="container inner-wrapper">
        <div class="row">

            <div class="col-md-8 login-left"></div>
            <div class="col-md-4 login-right">
                <form id="login" novalidate="novalidate" method="post" action="/auth/login" onsubmit="return Check()">
                    <div class="form-group id-group">
                        <label for="email">邮箱</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required="required" placeholder="email">
                        {{--@if(isset($email_msg))--}}
                            {{--<label style="color: white">{{$email_msg}}</label>--}}
                        {{--@endif--}}
                    </div>
                    <div class="form-group pswd-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" name="password" id="password" required="required" placeholder="password">
                        {{--@if(isset($pswd_msg))--}}
                            {{--<label style="color: white">{{$pswd_msg}}</label>--}}
                        {{--@endif--}}
                        @if(isset($error))
                            <label style="color: white;font-size: 16px" id="errorlabel">用户名或密码错误!</label>
                        @endif
                    </div>
                    <input type="submit" value="登陆" class="btn btn-block login-btn" id="submitLogin">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>

                <div class="form-footer">
                     还没有账号？<br>
                    <a href="/auth/register">->注册账号</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#">Home</a>
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Twitter</a>
                <a href="#">Contact</a>
                <small>Architect @ HCI Group</small>
            </div>
        </div>
    </div>
</footer>


<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/login.js"></script>
<script src="/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/dist/sweetalert.css">
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $(function(){
        var label=document.getElementById("errorlabel");
        if(label!=null){
            var d=document.getElementById("submitLogin");
            d.style.marginTop='0';
        }
    });
</script>

<script>

</script>
</body>
</html>