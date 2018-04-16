<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录面板</title>

    <!-- Bootstrap -->
    <link href="{{asset('/')}}bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('/')}}bootstrap-3.3.5-dist/js/html5shiv.min.js"></script>
    <script src="{{asset('/')}}bootstrap-3.3.5-dist/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script src="{{asset('/')}}jquery/jquery-3.1.1.min.js"></script>
<script src="{{asset('/')}}bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <div class="page-header container"><h1><big>管理员，请</big><small>先登录..</small></h1></div>
<div style="height: 70px"></div>
<div style="color: #140404;background: #d12727;">
    <div class="container">
<form class="form-horizontal col-sm-8 col-md-offset-4" action="{{url('user/logincheck')}}"  style="color: #140404;background: #d12727;padding-top:40px;" role="form" method="post">
    {!! csrf_field() !!}
  @if(session('msg'))
        <div style="color: red">{{session('msg')}}</div>
    @endif
    <div class="form-group has-feedback">
        <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="username" id="username" placeholder="请输入名称"><span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="inputPassword3" class="col-sm-2 control-label">密　码</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码"><span class="glyphicon glyphicon-off form-control-feedback"> </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <div class="checkbox">
                <label>
                    <input name="remember_token" type="checkbox">记住我
                </label>
            </div>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
        <div class="col-xs-8">
            <div class="input-group">
            <input type="text" name="code" class="form-control" id="code" placeholder="请输入验证码"><span class="input-group-addon">
  <img onclick="this.src='{{url("/verify")}}?'+Math.random();" id="code" name="code" src="{{url("/verify")}}" style="line-height: 40px;height: 40px;width:113px;"/>
        </span>
            </div></div>
    </div>
    <div class="form-group">
        <div class="col-md-2 col-md-offset-5">
            <button type="submit" class="btn btn-info btn-lg btn-block">登　录</button>
        </div>
    </div>
</form>
    </div>
    </div>
</body>
</html>