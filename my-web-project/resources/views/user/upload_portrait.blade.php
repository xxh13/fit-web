<?php
/**
 * Created by PhpStorm.
 * User: XXH
 * Date: 2016/6/20
 * Time: 14:31
 */
?>

@extends('util.main')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}">
@endsection

@section('title', '更换头像')

@section('content')
    <section class="container" style="margin-left: 50px;">
        <div style="background-color: #fff;box-shadow: 0 2px 5px rgba(1,1,1,0.3);margin: 5% 5% 0 5%;
        width: 75%;padding:20px;font-weight: 500;font-size: 20px">
            上传头像
        </div>
        <div style="background-color: #fff;box-shadow: 0 2px 5px rgba(1,1,1,0.3);margin: 1% 5% 0 5%;width: 75%;
        padding: 20px">
            <div class="ord-upload" style="text-align: center;border: 1px solid #eee8d5;width: 65%;margin-left: 17.5%">
                <embed style="width: 450px; height: 300px;" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" allowscriptaccess="always" wmode="window"
                       flashvars="target_url=/site/updateFace&amp;image_url=https://account-img.bilibili.com/bfs/face/8b6cdf04c5bcdeb68176cde1e853dd19dcc2de0e.jpg&amp;hasDelete=1" rel="noreferrer" src="https://static-s.bilibili.com/account/img/MemberImageUploader.swf" type="application/x-shockwave-flash" allowfullscreen="true" quality="high">
                    <p style="margin-bottom: 15px;margin-top: 15px;font-weight: 500">支持JPG、PNG等格式，图片需小于2M。</p>
            </div>
        </div>

    </section>
@endsection
