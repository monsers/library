@extends('layouts.admin_main')
@section('content')
    <div class="main ">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-car"></i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin')}}">首页</a></li>
                    <li><i class="fa fa-file-text"></i><a href="{{url('admin/book')}}">图书中心</a></li>
                    <li><i class="fa fa-pencil"></i><a href="#">编辑图书</a></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" style="hight:50px">
                <a class=" btn btn-primary " href="{{url('admin/book/')}}"><i class="fa  fa-sort-amount-asc"></i>全部图书</a> <a class=" btn btn-primary "  role="button" href="{{url('admin/book/create')}}">添加图书<i class="fa  fa-plus" ></i></a>
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
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">名称</label>
                    <div class="col-lg-10 col-md-10">
                    <div class="col-lg-4 col-md-4 ">
        <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="book_name" class="form-control" placeholder="名称" value="{{@$products->book_name}}">
                    </div>
                        </div>
                </div>
                    </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">作者</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4 ">
                            <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="book_author" class="form-control" placeholder="作者" value="{{@$products->book_author}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">ISBN</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4 ">
                            <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="book_ISBN" class="form-control" placeholder="ISBN" value="{{@$products->book_ISBN}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">位置</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4 ">
                            <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="location" class="form-control" placeholder="位置" value="{{@$products->location}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label">是否退还</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-2 col-md-2"><div class="input-group"><span class="input-group-addon" style="color: darkgreen">X</span>
                                @if($products->book_state)
                                    <input type="radio" name="book_state" value="0" >是
                                    <input type="radio" name="book_state" value="1" checked>否
                                    @else
                                    <input type="radio" name="book_state" value="0" checked>是
                                    <input type="radio" name="book_state" value="1">否
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="memid" style="@if($products->book_state)display: block @else  display: none @endif">
                    <label for="inputEmail3" class="col-lg-2 col-md-2 col-sm-12 control-label radio-inline">会员ID</label>
                    <div class="col-lg-10 col-md-10">
                        <div class="col-lg-4 col-md-4 ">
                            <div class="input-group"><span class="input-group-addon" style="color: darkgreen">T</span><input  name="pid" class="form-control" placeholder="要借书会员ID" value="{{@$products->borrows->pid}}">
                            </div>
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