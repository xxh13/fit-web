{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css')}}">--}}
    {{--<script src="{{ URL::asset('js/register.js') }}"></script>--}}
    {{--<title>注册</title>--}}
{{--</head>--}}

{{--<body>--}}
    {{--<div class="container">--}}
        {{--<form action="/auth/register" method="post" id="register" onsubmit="return Check()">--}}
            {{--{!! csrf_field() !!}--}}
            {{--<div id="login">--}}
                    {{--<select name="profession">--}}
                        {{--<option>Common User</option>--}}
                        {{--<option>Doctor</option>--}}
                        {{--<option>Coach</option>--}}
                        {{--<option>Admin</option>--}}
                    {{--</select>--}}
                    {{--<input id="username" name="name" required="required" type="text" value="{{ old('name') }}" placeholder="your username">--}}
                    {{--<input id="email" name="email" required="required" type="email" value="{{ old('email') }}" placeholder="your email">--}}
                    {{--<input id="password" name="password" required="required" type="password" placeholder="your--}}
                    {{--password" >--}}
                    {{--<input type="submit" value="Register">--}}
                {{--<p>--}}
                    {{--already a member ?--}}
                    {{--<button class="chang_link"><a href="/auth/login">login</a></button>--}}
                    {{--<label style="color:#ff0000">{{ isset($error) ? $error : "" }}</label>--}}
                {{--</p>--}}
            {{--</div>--}}

        {{--</form>--}}
    {{--</div>--}}
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

    <title>Ease Register</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/register.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
</head>

<body>
<div class="outer-wrapper">
    <div class="container inner-wrapper">
        <div class="row">
            <div class="col-md-7 register-right">
                <div class="form-title">
                    个人注册</br>

                </div>

                <form id="register" novalidate="novalidate"  accept-charset="UTF-8" method="post" action="/auth/register"  onsubmit="return Check()">
                    <div class="form-group">
                        <label for="role">注册角色类型</label>
                        <select name="profession" class="form-control" style="color: black">
                            <option>Common User</option>
                            <option>Doctor</option>
                            <option>Coach</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="identifier">邮箱</label>
                        {{--<input type="email" class="form-control" name="email" id="email">--}}
                        <input id="email" class="form-control" name="email" required="required" type="email" value="{{ old('email') }}" placeholder="email">
                        @if(isset($email_msg))
                            <label style="color: white">{{$email_msg}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">昵称</label>
                        {{--<input type="text" class="form-control" name="nickname" id="nickname">--}}
                        <input id="username" class="form-control" name="name" required="required" type="text" value="{{ old('name') }}" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="password">密码 [至少6位]</label>
                        {{--<input type="password" class="form-control" name="pre-password" id="pre-password">--}}
                        <input id="password" class="form-control" name="password" required="required" type="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="post-password">确认密码</label>
                        <input id="post-password" type="password" class="form-control" name="post-password" placeholder="password">
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="password">验证码</label></br>--}}
                        {{--<input type="tetx" class="form-control validation" name="validation" id="validation">--}}
                        {{--<img src="/images/v.png"><a href="" class="change-valid">    换一张</a>--}}
                    {{--</div>--}}
                    {{--<div style="min-height: 3px"></div>--}}
                    <input type="submit" value="注册" class="btn btn-block login-btn" id="submitForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>

                <div class="form-footer">
                    已经拥有账号<br>
                    <a href="/auth/login">->直接登陆</a>
                </div>
            </div>
            <div class="col-md-5 register-left"></div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="/">Home</a>
                <a href="/terms" target="_blank">Terms</a>
                <a href="/privacy" target="_blank">Privacy</a>
                <a href="https://twitter.com/wiplohq" target="_blank" rel="nofollow">Twitter</a>
                <a href="mailto:team@wiplo.com?subject=Hi Wiplo Team!" rel="nofollow">Contact</a>
                <small>Architect @ Cristph</small>
            </div>
        </div>
    </div>
</footer>


<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/register.js"></script>
<script src="/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/dist/sweetalert.css">
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
</body>
</html>