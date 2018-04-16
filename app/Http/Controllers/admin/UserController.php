<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UserController extends Controller{
    public function index(){
        return view('admin.login');
    }
    public function logincheck()
    {
        if ($input = Input::all()) {
            $users=User::where(['name'=> $input['username']])->first();
            if(!$users){
                return back()->with('msg', '用户名错误');
            }
            if (Auth::attempt(array('name' => $input['username'], 'password' =>$input['password'],),false)) {
                if (strtoupper(Session::get('Verify')) != strtoupper($input['code'])) { //strtoupper() 函数把字符串转换为大写。strtolower() 函数把字符串转换为小写。
                    return back()->with('msg', '验证码错误');                  //错误提示信息
                } else {
                    return redirect('admin');
                }
            }else{
                return back()->with('msg', '密码不正确！');
            }
        }
        else{
            return back()->with('msg', '输入不能空');
        }
    }

    public function Register()   //注册Request $request
    {
        $name = trim(Input::get('username'));
        $password = trim(Input::get('password'));
        $role = DB::table('users')->where('name', $name)->first();
        //$email = trim(Input::get('email'));
        //$telphon=trim(Input::get('telphon'));
//        if(($name || $email)==null){
        if($name==null){
            return Redirect::to('/register')->with('login_errors','不能为空！');
        }
        elseif ($role) {
            return Redirect::to('/register')->with('login_errors','用户名已存在！');
        } elseif(strlen($password) !==6){
            return Redirect::to('/register')->with('login_errors','密码只能是六位！');
        }
//        elseif(strlen($telphon) !==11){
//            return Redirect::to('/register')->with('login_errors','手机号码必须11位!');
//        }
        elseif (!(strtolower(Session::get('VerifyCode'))==strtolower(Input::get('verifycode'))))
        {
            return redirect::to('/register')->with('login_errors','验证码错误!');
        }
        else
        {
            DB::table('users')->insert(
                [
                    'name' => $name, 'password' => Hash::make($password),
//                    'email' => $email, 'telphon'=>$telphon,
                ]
            );
            return  Redirect::intend('/signin')->with('login_errors','注册成功！请登录');
        }
    }

    public function destroy(){  //退出
        Auth::logout();
        return redirect('admin');
    }

    public function show(){
      echo "gga";
    }

}