@extends('util.main')

@section('css')
    <link rel="stylesheet" href={{URL::asset('/css/advice/home.css')}}>
@endsection

@section('title', '建议广场')

@section('content')
    <section class="container-header">
        <h1>专家建议
            @if(!$isCommonUser)
                <button class="btn btn-info" data-toggle="modal" data-target="#myModal">发表建议</button>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>发表建议</h3>
                            </div>
                            <div class="modal-body">
                                <form action="/advice/create" method="post">
                                    {{ csrf_field()}}
                                    <textarea class="form-control my-textarea" placeholder="填写您的建议" name="advice">
                                    </textarea>
                                    <div class="btn-container pull-right">
                                        <button class="btn btn-info" data-dismiss="modal">取消</button>
                                        <input type="submit" class="btn btn-info" value="提交">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-home"></i>
                    主页
                </a>
            </li>
            <i class="fa fa-angle-right"></i>
            <li class="active">
                建议广场
            </li>
        </ol>
    </section>

    <section class="container-body">
        <div class="info-panel">
            <table class="table">
                <tbody>
                    <tr>
                        @for($i=0; $i<3; ++$i)
                        <td>
                            <div class="panel">
                                <div class="panel-heading">
                                    <img src="/image/portrait/{{$advice[$i]['authorId']}}.jpg">
                                    <span>{{$advice[$i]['name']}}</span>
                                </div>
                                <div class="panel-body">
                                    {{$advice[$i]['content']}}
                                </div>
                                <div class="panel-footer pull-right">
                                    <span>
                                        <i class="fa fa-thumbs-up">{{$advice[$i]['like']}}</i>
                                    </span>
                                    <span>
                                        <i class="fa fa-thumbs-down">{{$advice[$i]['unlike']}}</i>
                                    </span>

                                </div>
                            </div>
                        </td>
                        @endfor
                    </tr>
                    <tr>
                        @for($i=3; $i<6; ++$i)
                            <td>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <img src="/image/portrait/{{$advice[$i]['authorId']}}.jpg">
                                        <span>{{$advice[$i]['name']}}</span>
                                    </div>
                                    <div class="panel-body">
                                        {{$advice[$i]['content']}}
                                    </div>
                                    <div class="panel-footer pull-right">
                                    <span>
                                        <i class="fa fa-thumbs-up">{{$advice[$i]['like']}}</i>
                                    </span>
                                    <span>
                                        <i class="fa fa-thumbs-down">{{$advice[$i]['unlike']}}</i>
                                    </span>

                                    </div>
                                </div>
                            </td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


@endsection