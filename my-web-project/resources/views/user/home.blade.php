
<?php
?>

@extends('util.main')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/css/bootstrap3-wysihtml5.min.css">


@endsection

@section('title', '主页')

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
                    <a href="/health/home#rank" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="/health/home#histogramChart3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="/health/home#histogramChart" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="/health/home#histogramChart2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        {{--@yield('content')--}}


        {{--发表心情--}}
        <div class="box">
            <div class="box-header">
                {{--<h3 class="box-title" style="font-size: 18px">发表心情--}}
                {{--<small>有什么有趣的事情快快告诉大家吧</small>--}}
                {{--</h3>--}}
                <div style="font-size: 20px;font-weight: bolder">发表心情</div>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form>
                    <textarea id="moodContent" class="textarea" placeholder="有什么有趣的事情要告诉大家呢..." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <button type="button" class="btn bg-purple btn-flat margin" style="margin: 20px 0 0 10px" id="postMood">发布心情</button>
                </form>
            </div>
        </div>

        {{--心情圈--}}
        <div id="moods2" class="row"></div>
        <div id="moods" class="row">
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">

                        <p>I took this photo this morning. What do you guys think?</p>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> 分享</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> 赞</button>
                        <span class="pull-right text-muted">127 赞 - 3 分享</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments" id="comments1">
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                    <span class="username">
                                        Maria Gonzales
                                        <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->

                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                    <span class="username">
                                        Luna Stark
                                        <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <div>
                            <img class="img-responsive img-circle img-sm" src="/image/portrait/1.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="发布你的评论...">
                                <input type="hidden" value="comments1">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- post text -->
                        <p>Far far away, behind the word mountains, far from the
                            countries Vokalia and Consonantia, there live the blind
                            texts. Separated they live in Bookmarksgrove right at</p>

                        <p>the coast of the Semantics, a large language ocean.
                            A small river named Duden flows by their place and supplies
                            it with the necessary regelialia. It is a paradisematic
                            country, in which roasted parts of sentences fly into
                            your mouth.</p>

                        <!-- Attachment -->
                        <div class="attachment-block clearfix">
                            <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image">

                            <div class="attachment-pushed">
                                <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                                <div class="attachment-text">
                                    Description about the attachment can be placed here.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                                </div>
                                <!-- /.attachment-text -->
                            </div>
                            <!-- /.attachment-pushed -->
                        </div>
                        <!-- /.attachment-block -->

                        <!-- Social sharing buttons -->
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> 分享</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> 赞</button>
                        <span class="pull-right text-muted">45 赞 - 2 分享</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-comments" id="comments2">
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user5-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                      <span class="username">
                        Nora Havisham
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                                The point of using Lorem Ipsum is that it has a more-or-less
                                normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <div>
                            <img class="img-responsive img-circle img-sm" src="/image/portrait/1.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="发布你的评论...">
                                <input type="hidden" value="comments2">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
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
    </section>

    <script src="/dist/js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/dist/js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/dist/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/dist/sweetalert.css">
    <script>

        $("#postMood").click(function(){

            var htm=$('#moodContent').val();
            if(htm.length==0){
                swal("请输入发布内容~", "", "success");
                return;
            }
            var imgpos=htm.indexOf("<img");
            var imgendpos=htm.lastIndexOf("g\">");

            var pre_str="";
            var mid_str="";
            var post_str="";

            if(imgpos>=0&&imgendpos>=0){
                pre_str=htm.substring(0,imgpos);
                mid_str=htm.substring(imgpos,imgendpos)+"g\">";
                post_str=htm.substring(imgendpos).substring(3);
                var patch_str="class=\"img-responsive pad\" ";
                mid_str=mid_str.substring(0,5)+patch_str+mid_str.substring(5);
            }else{
                pre_str=htm;
            }

            var div=document.getElementById("moods2");
            var mood=document.createElement("div");
            mood.setAttribute("class","col-md-6");

            var myDate = new Date();
            var hour=myDate.getHours();       //获取当前小时数(0-23)
            var minute=myDate.getMinutes();     //获取当前分钟数(0-59)
            var str="";
            if(hour>=13){
                str=(hour-1)+":"+minute+" PM Today";
            }else{
                str=hour+":"+minute+" AM Today";
            }

            mood.innerHTML="<div id='newTopic' class='box box-widget'> " +
            "<div class='box-header with-border'> " +
            "<div class='user-block'> " +
            "<img class='img-circle' src='/image/portrait/1.jpg' alt='User Image'>" +
            "<span class='username'><a href='#'>Alexander Pierce</a></span> " +
            "<span class='description'>Shared publicly - "+str+"</span> " +
            "</div> " +
            "<div class='box-tools'> " +
            "<button type='button' class='btn btn-box-tool' data-toggle='tooltip' title='' data-original-title='Mark as read'> " +
            "<i class='fa fa-circle-o'></i></button> " +
            "<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i> " +
            "</button> <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button> " +
            "</div> </div> " +
            "<div class='box-body'> " +
//        "<img class='img-responsive pad' src='../dist/img/photo2.png' alt='Photo'> " +
//        "<p>I took this photo this morning. What do you guys think?</p> " +
            pre_str+mid_str+post_str+
            "<button type='button' class='btn btn-default btn-xs'><i class='fa fa-share'></i> 分享</button> " +
            "<button type='button' class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> 赞</button> " +
            "<span class='pull-right text-muted'>0 赞 - 0 分享</span> " +
            "</div> <div class='box-footer box-comments' id='comments3'> </div> " +
            "<div class='box-footer'> <div> " +
            "<img class='img-responsive img-circle img-sm' src='/image/portrait/1.jpg' alt='Alt Text'> " +
            "<div class='img-push'> " +
            "<input type='text' class='form-control input-sm' placeholder='发布你的评论...'> " +
            "<input type='hidden' value='comments3'> " +
            "</div> </div> </div> </div>";


            if(div.childElementCount==0){
                div.appendChild(mood);
                var postdiv=document.getElementById("moods");
                var cd=postdiv.firstChild.cloneNode(true);
                div.appendChild(cd);
                postdiv.removeChild(postdiv.firstChild);
            }else{
//                alert("L"+div.childElementCount);
                div.insertBefore(mood,div.firstChild);//在得到的第一个元素之前插入
                var posrtdiv=document.getElementById("moods");
                var cd=div.lastChild.cloneNode(true);
                posrtdiv.insertBefore(cd,posrtdiv.firstChild);
                div.removeChild(div.lastChild);
            }
//        div.appendChild(mood);



//        window.location.hash = "#newTopic";
//            alert("发布成功！");
            swal("发布成功！", "", "success");
            var iframe=document.getElementById("moodContent").nextElementSibling.nextElementSibling;
            var doc=iframe.contentDocument;
            var t=doc.getElementsByClassName("wysihtml5-editor");
            t[0].innerHTML="";


            var commentNocdes=document.getElementsByClassName("input-sm");
            for(var i=0;i<commentNocdes.length;i++){
                commentNocdes[i].onkeydown=function(e){
                    var keyCode = e.keyCode;

                    if(keyCode==13){
                        var myDate = new Date();
                        var hour=myDate.getHours();       //获取当前小时数(0-23)
                        var minute=myDate.getMinutes();     //获取当前分钟数(0-59)
                        var str="";
                        if(hour>=13){
                            str=(hour-1)+":"+minute+" PM Today";
                        }else{
                            str=hour+":"+minute+" AM Today";
                        }

                        var input=this.nextElementSibling.value;

                        var comments=document.getElementById(input);
                        var comment=document.createElement("div");
                        comment.setAttribute("class","box-comment");
                        comment.innerHTML="<img class='img-circle img-sm' src='/image/portrait/1.jpg' alt='User Image'> " +
                        "<div class='comment-text'> " +
                        "<span class='username'>" +
                        "Alexander Pierce " +
                        "<span class='text-muted pull-right'>"+str+"</span> " +
                        "</span><!-- /.username -->" +
                        this.value +
                        "</div>";
                        comments.appendChild(comment);

                        this.value="";
                    }
                }
            }
        });

        function like(){
//        alert(this.innerText);
//        alert(this.nextElementSibling.innerText);
//        45   likes     -      2     comments
//        0         1          2    3        4
            var color=this.style.color;
            if(color==''){
                this.style.color="#FF270A";
                var span=this.nextElementSibling;
                var strarray=span.innerText.split(' ');
                var str=(parseInt(strarray[0])+1)+' '+strarray[1]+' '+strarray[2]+' '+strarray[3]+' '+strarray[4];
                span.innerText=str;
            }else{
                this.style.color="";
                var span=this.nextElementSibling;
                var strarray=span.innerText.split(' ');
                var str=(parseInt(strarray[0])-1)+' '+strarray[1]+' '+strarray[2]+' '+strarray[3]+' '+strarray[4];
                span.innerText=str;
            }

        }

        function share(){
            var color=this.style.color;
            if(color==''){
                this.style.color="#FF270A";
                var span=this.nextElementSibling.nextElementSibling;
                var strarray=span.innerText.split(' ');
                var str=strarray[0]+' '+strarray[1]+' '+strarray[2]+' '+(parseInt(strarray[3])+1)+' '+strarray[4];
                span.innerText=str;
            }else{
                this.style.color="";
                var span=this.nextElementSibling.nextElementSibling;
                var strarray=span.innerText.split(' ');
                var str=strarray[0]+' '+strarray[1]+' '+strarray[2]+' '+(parseInt(strarray[3])-1)+' '+strarray[4];
                span.innerText=str;
            }

        }


        $(function () {
            //bootstrap WYSIHTML5 - text editor

            $('#moodContent').wysihtml5({
                toolbar: {
                    fa: true
                }
            });

            var likeNocdes=document.getElementsByClassName("fa-thumbs-o-up");
            for(var i=0;i<likeNocdes.length;i++){
                likeNocdes[i].parentNode.addEventListener("click",like,false);
            }

            var shareNocdes=document.getElementsByClassName("fa-share");
            for(var i=0;i<shareNocdes.length;i++){
                shareNocdes[i].parentNode.addEventListener("click",share,false);
            }

            var commentNocdes=document.getElementsByClassName("input-sm");
            for(var i=0;i<commentNocdes.length;i++){
                commentNocdes[i].onkeydown=function(e){
                    var keyCode = e.keyCode;

                    if(keyCode==13){
                        var myDate = new Date();
                        var hour=myDate.getHours();       //获取当前小时数(0-23)
                        var minute=myDate.getMinutes();     //获取当前分钟数(0-59)
                        var str="";
                        if(hour>=13){
                            str=(hour-1)+":"+minute+" PM Today";
                        }else{
                            str=hour+":"+minute+" AM Today";
                        }

                        var input=this.nextElementSibling.value;

                        var comments=document.getElementById(input);
                        var comment=document.createElement("div");
                        comment.setAttribute("class","box-comment");
                        comment.innerHTML="<img class='img-circle img-sm' src='/image/portrait/1.jpg' alt='User Image'> " +
                        "<div class='comment-text'> " +
                        "<span class='username'>" +
                        "Alexander Pierce " +
                        "<span class='text-muted pull-right'>"+str+"</span> " +
                        "</span><!-- /.username -->" +
                        this.value +
                        "</div>";
                        comments.appendChild(comment);

                        this.value="";
                    }
                }
            }


        });
    </script>
@endsection