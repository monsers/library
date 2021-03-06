@extends('layouts.admin_main')
@section('content')
    <div class="main ">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-car"></i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin')}}">首页</a></li>
                    <li><i class="fa fa-file-text"></i><a href="{{url('admin/book')}}">图书中心</a></li>
                    <li><i class="fa fa-pencil"></i><a href="#">图书列表</a></li>
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" style="hight:50px">
             <a class=" btn btn-primary " href="{{url('admin/book')}}"><i class="fa  fa-sort-amount-asc"></i>全部图书</a> <a class=" btn btn-primary "  role="button" href="{{url('admin/book/create')}}">添加图书<i class="fa  fa-plus" ></i></a>
                 </div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr class="info">
                    <td>排序</td>
                    <td>图书名</td>
                    <td>作者</td>
                    <td>ISBN</td>
                    <td>位置</td>
                    <td>借出或退还</td>
                    <td>借出时间</td>
                    <td>返还时间</td>
                    <td>过期费用(元)</td>
                    <td>ID</td>
                <tobody>
                  @foreach($d as $i=>$t)<tr>
                  <td  class=" col-md-2 " >
                      {{$i}}
                  </td>

                    <td >{{$t->books->book_name}}</td>
                        <td>{{$t->books->book_author}}</td>
                        <td>{{$t->books->book_ISBN}}</td>
                        <td>{{$t->books->location}}</td>
                        @if($t->books->book_state==0)<td>已退还</td>@else <td>借出</td>@endif
                        <td>{{@date("Y-m-d H:i:s",$t->borrow_time)}}</td>
                        <td>{{@date("Y-m-d H:i:s",$t->return_time)}}</td>
                        <td>{{@$t->counts}}</td>
                        <td>{{$t->id}}</td>
                       </tr>@endforeach
           </tobody></table>
               {{--<div class="fenpage">{!! @$data->links() !!}</div>--}}
                <script>
                    function changeorder(obj,id){
                        var orders=$(obj).val();
                        $.post('{{url('admin/book/change')}}',{_token:'{{csrf_token()}}',orders:orders,'id':id},function(data){
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
                            $.post('{{url('admin/book/')}}/'+id+'', {_token: '{{csrf_token()}}', _method: 'delete', id: id}, function (data) {
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