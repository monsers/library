<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proton - Admin Template</title>
<style>
    .fenpage{
        text-align: center;
    }
</style>
    <!-- Favicon and touch icons -->
    <link rel="{{asset('/')}}shortcut icon" href="{{asset('/')}}hotai/ico/favicon.ico" type="image/x-icon" />
    <!-- Css files -->
    <link href="{{asset('/')}}hotai/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}hotai/css/jquery.mmenu.css" rel="stylesheet">
    <link href="{{asset('/')}}hotai/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('/')}}hotai/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="{{asset('/')}}hotai/css/style.min.css" rel="stylesheet">
    <link href="{{asset('/')}}hotai/css/add-ons.min.css" rel="stylesheet">
    <script src="{{asset('/')}}/jquery/jquery-3.1.1.min.js"></script>
    <!--layer弹窗插件-->
    <script src="{{asset('/')}}/layer/layer.js"></script>
<!--ckeditor-->
    <script type="text/javascript">
        var filebrowserUploadUrl = '{{url('admin/upload')}}?_token={{csrf_token()}}';
    </script>
    <script src="{{asset('/')}}/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="{{asset('/')}}/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <script type="text/javascript">
            function ckeditorUpload(file){
                $('#cke_117_textInput').val(file);
                $('#cke_198_label').click();
            }
    </script>
    <script type="text/javascript">
        function shangchuan(){                       //缩略图上传
            var file=document.getElementById("cke").files[0];
            var b=window.URL.createObjectURL(file);
            document.getElementById('prefile').src=b;    //传值
        }
    </script>
    <!--uploadify-->
    <script src="{asset('/')}}/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{asset('/')}}/uploadify/uploadify.css">
</head>
<body>
<!-- start: Header -->
<div class="navbar" role="navigation">

    <div class="container-fluid">

        <ul class="nav navbar-nav navbar-actions navbar-left">
            <li class="visible-md visible-lg"><a href="icons-font-awesome.html#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
            <li class="visible-xs visible-sm"><a href="icons-font-awesome.html#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>
        </ul>

        <form class="navbar-form navbar-left" method="get" action="{{url('admin/search')}}">
            <button type="submit" class="fa fa-search"></button>
            <input type="text" name="keywords" class="form-control" placeholder="搜索...."></a>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown visible-md visible-lg">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-avatar" src="{{asset('/')}}hotai/img/avatar.jpg" alt="user-mail">管理员{{session('infouser')['name']}}</a>
                <ul class="dropdown-menu">
                    <li class="dropdown-menu-header">
                        <strong>Account</strong>
                    </li>
                    <li><a href="page-profile.html"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="page-login.html"><i class="fa fa-wrench"></i> Settings</a></li>
                    <li><a href="page-invoice.html"><i class="fa fa-usd"></i> Payments <span class="label label-default">10</span></a></li>
                    <li><a href="gallery.html"><i class="fa fa-file"></i> File <span class="label label-primary">27</span></a></li>
                    <li class="divider"></li>
                    <li><a href="index.html"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </li>
            <li><a href="{{url('user/destroy')}}"><i class="fa fa-power-off"></i></a></li>
        </ul>

    </div>

</div>
<!-- end: Header -->

<div class="container-fluid content">

    <div class="row">

        <!-- start: Main Menu -->
        <div class="sidebar ">

            <div class="sidebar-collapse">
                <div class="sidebar-header t-center">
                    <span >栏目<i class="medium-low"></i> <i class="fa fa-thumbs-o-down fa-3x blue"></i></span>
                </div>
                <div class="sidebar-menu">
                    <ul class="nav nav-sidebar">
                            <li><a href="{{url('admin')}}/"><i class="fa "></i><span class="text"> 首页</span></a></li>
                        <li><a href="#"><i class="fa fa-trello"></i><span class="text"> 图书中心</span><span class="fa fa-angle-down pull-right"></span></a>
                            <ul class="nav sub" >
                                <li><a href="{{url('admin/book/')}}"><i class="fa fa-table"></i><span class="text">图书列表</span></a></li>
                                <li><a href="{{url('admin/book/borrow')}}"><i class="fa fa-table"></i><span class="text">借出图书</span></a></li>
                                <li><a href="{{url('admin')}}/book/create"><i class="fa  fa-plus-square"></i><span class="text"> 添加图书</span></a></li></ul>
                        </li>
                        <li><a href="#"><i class="fa fa-trello"></i><span class="text"> 会员中心</span><span class="fa fa-angle-down pull-right"></span></a>
                            <ul class="nav sub" >
                                <li><a href="{{url('admin/partner/')}}"><i class="fa fa-table"></i><span class="text">会员列表</span></a></li>
                                <li><a href="{{url('admin')}}/partner/create"><i class="fa  fa-plus-square"></i><span class="text"> 添加会员</span></a></li></ul>
                        </li>
                       </ul>
                </div>
            </div>
            <div class="sidebar-footer">

                <div class="sidebar-brand">
                    Proton
                </div>

                <ul class="sidebar-terms">
                    <li><a href="index.html#">Terms</a></li>
                    <li><a href="index.html#">Privacy</a></li>
                    <li><a href="index.html#">Help</a></li>
                    <li><a href="index.html#">About</a></li>
                </ul>

                <div class="copyright text-center">
                    <small>Proton <i class="fa fa-coffee"></i> from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></small>
                </div>
            </div>

        </div>
        <!-- end: Main Menu -->
@yield('content')

        <br><br><br>


        <div id="usage">
            <ul>
                <li>
                    <div class="title">Memory</div>
                    <div class="bar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="desc">4GB of 8GB</div>
                </li>
                <li>
                    <div class="title">HDD</div>
                    <div class="bar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                        </div>
                    </div>
                    <div class="desc">250GB of 1TB</div>
                </li>
                <li>
                    <div class="title">SSD</div>
                    <div class="bar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                        </div>
                    </div>
                    <div class="desc">700GB of 1TB</div>
                </li>
                <li>
                    <div class="title">Bandwidth</div>
                    <div class="bar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="desc">90TB of 100TB</div>
                </li>
            </ul>
        </div>

    </div><!--/container-->


    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Warning Title</h4>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="clearfix"></div>


    <!-- start: JavaScript-->
    <!--[if !IE]>-->

    <script src="{{asset('/')}}hotai/js/jquery-2.1.1.min.js"></script>

    <!--<![endif]-->

    <!--[if IE]>

    <script src="{{asset('/')}}hotai/js/jquery-1.11.1.min.js"></script>

    <![endif]-->

    <!--[if !IE]>-->

    <script type="text/javascript">
        window.jQuery || document.write("<script src='{{asset('/')}}hotai/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
    </script>

    <!--<![endif]-->

    <!--[if IE]>

    <script type="text/javascript">
        window.jQuery || document.write("<script src='/hotai/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
    </script>

    <![endif]-->
    <script src="{{asset('/')}}hotai/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{asset('/')}}hotai/js/bootstrap.min.js"></script>


    <!-- page scripts -->
    <script src="{{asset('/')}}hotai/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/moment/moment.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/fullcalendar/js/fullcalendar.min.js"></script>
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="{{asset('/')}}hotai/plugins/excanvas/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.stack.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/flot/jquery.flot.spline.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/xcharts/js/xcharts.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/placeholder/jquery.placeholder.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/morris/js/morris.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('/')}}hotai/plugins/jvectormap/js/gdp-data.js"></script>
    <script src="{{asset('/')}}hotai/plugins/gauge/gauge.min.js"></script>


    <!-- theme scripts -->
    <script src="{{asset('/')}}hotai/js/SmoothScroll.js"></script>
    <script src="{{asset('/')}}hotai/js/jquery.mmenu.min.js"></script>
    <script src="{{asset('/')}}hotai/js/core.min.js"></script>
    <script src="{{asset('/')}}hotai/plugins/d3/d3.min.js"></script>

    <!-- inline scripts related to this page -->
    <script src="{{asset('/')}}hotai/js/pages/index.js"></script>

    <!-- end: JavaScript-->
<script type="text/javascript">
    $("[name='book_state']").click(function(){
            if($(this).val()==1){
                $("#memid").show();
            }else{
                $("#memid").hide();
            }
    })
    </script>
</body>
</html>