@extends('layouts.admin_main')
@section('content')
    <div class="main ">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-car"></i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin')}}">首页</a></li>
                    <li><i class="fa fa-file-text"></i><a href="{{url('admin/partner')}}">合作会员</a></li>
                    <li><i class="fa fa-pencil"></i><a href="#">编辑会员</a></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" style="hight:50px">
                <a class=" btn btn-primary " href="{{url('admin/partner/')}}"><i class="fa  fa-sort-amount-asc"></i>全部会员</a> <a class=" btn btn-primary "  role="button" href="{{url('admin/partner/create')}}">添加会员<i class="fa  fa-plus" ></i></a>
            </div>
            @if(count($errors)>0)
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <div style=" color:red;background-color: dodgerblue">{{$error}}</div>
                    @endforeach
                @else
                    <div style=" color:red;background-color: dodgerblue">{{$errors}}</div>
                @endif
            @endif
            <form class="form-horizontal" role="form" action="{{$urlname}}" method="post" enctype="multipart/form-data">

                <div style="height: 10px;">{!! @$method !!}</div>
                {!! csrf_field() !!}
                @if(session('msg'))
                    <div style="color: red">{{session('msg')}}</div>
                @endif
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">名称</label>
                    <div class="col-lg-10 col-md-10">
                    <div class="col-lg-4 col-md-4 ">
                    <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="name" class="form-control" placeholder="名称" value="{{@$products->name}}">
                    </div>
                        </div>
                </div>
               </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">密码</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4 ">
                            <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="password" class="form-control" placeholder="密码" value="{{@$products->name}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label">等级</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4"><div class="input-group"><span class="input-group-addon" style="color: darkgreen">X</span><input class="form-control" name="level" value="{{@$products->level}}" placeholder="成人填'1'，幼儿填'2'"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                        <button type="submit" class="btn btn-success btn-group">提交</button>
                        <button type="submit" class="btn btn-danger btn-group">重置</button>
                    </div>
                    </div>
                <div style="height: 10px;"></div>
            </form>
        </div>
    </div>    <script>
        initSample();
    </script>
@endsection