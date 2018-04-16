<?php

namespace App\Http\Controllers\Admin;
use App\Nav;
use App\Http\Controllers\Controller;
use App\Partners;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class PartnerController extends Controller{
    public function index(){
        $data=Partners::orderBy('id','ASC')->get();
       return view('admin.partner.index',['d'=>$data]);
    }

    public function create(){
        $urlname=route('partner.store');
        return view('admin.partner.edit',['urlname'=>$urlname]);
    }

    public function store(){
        $input=Input::except('_token');
        if($input['level']=1){          //成人
            $input['max_booknumber']=6;
        }elseif($input['level']=2){       //幼儿
            $input['max_booknumber']=3;
        }
        $role=[
            'name' => 'required',
            'level'=>'required',
            'password'=>'required',
        ];
        $messages = [
            'name.required'    => '名称不能为空',
            'level.required'    => '等级不能为空',
            'password.required'    => '密码不能为空',
        ];
        $input['password']=Hash::make($input['password']);
        $role2 = Partners::where('name', $input['name'])->first();
        $validateu = Validator::make($input,$role,$messages);
        if( $validateu->passes()) {
            if ($role2) {
                return back()->with('errors','用户名已存在！');
            }else{
                $re= Partners::create($input);
                if($re){
                    return redirect('admin/partner');
                }else{
                    return back()->with('errors','数据填充失败，请稍后重试');
                }
            }

        }else{
            return back()->withErrors($validateu);
        }
    }

    public function edit($id){
        $products= Partners::find($id);
        $urlname=route('partner.update',['partner'=>$id]);
        $method='<input type="hidden" name="_method" value="put">';
        return view('admin.partner.edit', compact('products','urlname','method'));
    }

    public function update($id){
        $input=Input::except('_token','_method');
        if($input['level']=1){          //成人
            $input['max_booknumber']=6;
        }elseif($input['level']=2){       //幼儿
            $input['max_booknumber']=3;
        }
        $re=Partners::where('id',$id)->update($input);
        if($re){
            return redirect('admin/partner');
        }else{
            return back()->with('errors','修改失败');
        }
    }

    public function show(){
    }

    public function destroy($id){
        $products=Partners::find($id);
        $rey=$products->delete();
        if($rey){
            $data['state']='1';
            $data['vul'] = '删除成功！';
        } else {
            $data['state']='0';
            $data['vul'] =  '删除失败！';
        }
        return $data;
    }
}