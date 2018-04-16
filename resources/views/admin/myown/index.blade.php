@extends('layouts.admin_main')
@section('content')
<div class="top30"></div>
<div class="main ">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-car"></i></h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{url('admin')}}">首页</a></li>
                <li><i class="fa fa-file-text"></i><a href="{{url('admin/partner')}}">合作会员</a></li>
                <li><i class="fa fa-pencil"></i><a href="#">会员列表</a></li>
            </ol>
        </div>
    </div>
    <!-- 右边开始 -->
    <div class="cptj1 fr">

        <div class="news_detail">
            <div class="news_detail_title">
                <h3>用户名：{{$news->name}}</h3>
                <div class="n_tit">
                    等级：{{$news->level}}
                </div>
            </div>
            <div class="news_detail_title">
                <div class="n_tit">
            已借书数目：{{$news->borrow_books}}</div>
            </div>
            <div class="news_detail_title">
                <div class="n_tit">
            <span>账户余额：{{$news->balance}}</span>
                </div>
            </div>
            <div class="news_detail_title">
                <div class="n_tit">
            <span>最大可借书数目：{{$news->max_booknumber}}</span>
                </div>
            </div>
            <div id="MR_nrPic">
            </div>
            <div class="news_detail_content">
                <p>{!! @$news->content !!}</p></div>
        </div>

    </div>



</div>
@endsection