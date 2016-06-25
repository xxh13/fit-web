<?php
/**
 * Created by PhpStorm.
 * User: XXH
 * Date: 2016/6/20
 * Time: 14:31
 */
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/util/main.css')}}">
        @yield('css')
        {{--<link rel="stylesheet" href={{URL::asset('Han-master/Han-master/dist/han.min.css')}}>--}}
        {{--<link rel="stylesheet" media="all" href="//cdnjs.cloudflare.com/ajax/libs/Han/3.2.7/han.min.css">--}}
        <link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}">
        <script src="{{URL::asset('js/jquery/jquery-3.0.0.min.js')}}"></script>
        {{--<script src={{URL::asset('Han-master/Han-master/')}}></script>--}}
        @yield('js')
        <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="wrapper">
            <header class="main-header">
                <a class="logo">
                <span class="logo">
                    <b>HEALTH MANAGER</b>
                </span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown message-menu">
                                <a href="#" class="dropdown-toggle message-menu" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li></li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="/image/portrait/1.jpg" class="user-image">
                                    <span class="hidden-xs user-name">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="/image/portrait/1.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            Alexander Pierce
                                            <br>
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="/user/upload_portrait" class="btn btn-default btn-flat">设置头像</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="/auth/logout" class="btn btn-default btn-flat">退出</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/image/portrait/1.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Alexander Pierce</p>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="menu-info">
                            <a href="/user/home">
                                <i class="fa fa-home"></i>
                                <span>我的首页</span>
                            </a>
                        </li>
                        <li class="menu-info">
                            <a href="/health/home">
                                <i class="fa fa-database"></i>
                                <span>数据中心</span>
                            </a>
                        </li>
                        <li class="menu-info treeview" onclick="dropdown(this)">
                            <a href="#">
                                <i class="fa fa-flag"></i>
                                <span>活动中心</span>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="treeview-menu-my">
                                <li>
                                    <a href={{URL::asset("/activity/all")}}>
                                        <i class="fa fa-circle-o"></i>
                                        活动列表
                                    </a>
                                </li>
                                <li>
                                    <a href={{URL::asset("/activity/my_activity")}}>
                                        <i class="fa fa-circle-o"></i>
                                        我的活动
                                    </a>
                                </li>
                                <li>
                                    <a href={{URL::asset("/activity/create")}}>
                                        <i class="fa fa-circle-o"></i>
                                        发起活动
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-info">
                            <a href="/advice/home">
                                <i class="fa fa-compass"></i>
                                <span>建议广场</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <section class="container">
                @yield('content')
            </section>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b>
                    1.2
                </div>
                <strong>
                    <a href="https://github.com/xxh13/web-project">
                        web-project
                    </a>
                </strong>
                NJU-SE-HCI Project
            </footer>
        </div>

    </body>

    <script>
        function dropdown(menu){
            // 如果树状图没有打开
            if(!hasClass(menu, 'active-tree')){
                menu.className += ' active-tree';
                menu.getElementsByTagName('ul')[0].style.display = 'block';
                menu.getElementsByTagName('i')[1].className = 'fa fa-angle-down pull-right'

            }else{
                menu.className = 'menu-info treeview';
                menu.getElementsByTagName('ul')[0].style.display = 'none';
                menu.getElementsByTagName('i')[1].className = 'fa fa-angle-right pull-right'
            }
        }
        function hasClass(element, cls) {
            return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
        }
    </script>
</html>