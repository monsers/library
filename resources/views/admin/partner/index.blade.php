@extends('layouts.admin_main')
@section('content')
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
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" style="hight:50px">
             <a class=" btn btn-primary " href="{{url('admin/partner')}}"><i class="fa  fa-sort-amount-asc"></i>全部会员</a> <a class=" btn btn-primary "  role="button" href="{{url('admin/partner/create')}}">添加会员<i class="fa  fa-plus" ></i></a>
                 </div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr class="info">
                    <td>排序</td>
                    <td>会员名</td>
                    <td>已借书数目</td>
                    <td>账户余额</td>
                    <td>最多可借书</td>
                    <td>等级</td>
                    <td>ID</td>
                   <td>操作</td></tr></thead>
                <tobody>
                  @foreach($d as $i=>$t)<tr>
                  <td  class=" col-md-2 " >
                      {{$i}}
                  </td>

                    <td >{{$t->name}}</td>
                        <td >{{$t->borrow_books}}</td>
                        <td >{{$t->balance}}</td>
                        <td >{{$t->max_booknumber}}</td>
                        <td>{{$t->level}}</td>
                        <td>{{$t->id}}</td>
                  <td><a class="btn btn-default btn-sm" href="{{url('admin/partner/'.$t->id.'/edit')}}" role="button">修改</a><a class="btn btn-default btn-sm" role="button" href="#" onclick="delet('{{$t->id}}');">删除</a></td>
                    </tr>@endforeach
           </tobody></table>
               {{--<div class="fenpage">{!! @$data->links() !!}</div>--}}
                <script>
                    function changeorder(obj,id){
                        var orders=$(obj).val();
                        $.post('{{url('admin/partner/change')}}',{_token:'{{csrf_token()}}',orders:orders,'id':id},function(data){
                            if(data.state==1){
                                layer.msg(data.vul, {icon: 6});
                            }   else{
                                layer.msg(data.vul, {icon: 5});
                            }
                        });
                    }
                    function delet(id){
                        layer.msg('确认删除吗', { time: 20000, //20s后自动关闭
                         btn: ['确定', '取消']
                        },function() {
                            $.post('{{url('admin/partner/')}}/'+id+'', {_token: '{{csrf_token()}}', _method: 'delete', id: id}, function (data) {
                                if (data.state==1) {
                                  window.location.reload();
                                    layer.msg(data.vul, {icon: 6});
                                } else {
                                    layer.msg(data.vul, {icon: 5});
                                }
                            });
                        },function(){
                            });
                    }
                </script>
        </div>
    </div>
    @endsection