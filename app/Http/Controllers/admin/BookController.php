<?php

namespace App\Http\Controllers\Admin;
use App\Borrows;
use App\Nav;
use App\Http\Controllers\Controller;
use App\Books;
use App\Partners;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller{
    public function index(){
       $data=Books::orderBy('id','ASC')->get();
       return view('admin.books.index',['d'=>$data]);
    }

    public function create(){
        $urlname=route('book.store');
        return view('admin.books.edit',['urlname'=>$urlname]);
    }

    public function store(){
        $input=Input::except('_token','pid');
        $pid=Input::get('pid');
        $role=[
            'book_name' => 'required',
            'book_author'=>'required',
            'location'=>'required',
            'book_ISBN'=>'required'
        ];
        $messages = [
            'book_name.required'    => '名称不能为空',
            'book_author.required'    => '等级不能为空',
            'location'=>'位置不能为空',
            'book_ISBN'=>'ISBN不能为空',
        ];
        $validateu = Validator::make($input,$role,$messages);
        if( $validateu->passes()) {
            $re= Books::create($input);
            if($re){
                if($input['book_state']==1){    //
                    $this::checktime($input,$pid);
                }else{
                    $this::delets($input);
                }
            }else{
                return back()->with('errors','数据填充失败，请稍后重试');
            }
        }else{
            return back()->withErrors($validateu);
        }
        // dd(Books::all());
    }

    public function edit($id){
        $products= Books::with('borrows')->find($id);
        $urlname=route('book.update',['book'=>$id]);
        $method='<input type="hidden" name="_method" value="put">';
        return view('admin.books.edit', compact('products','urlname','method'));
    }

    public function update($id){
        $input=Input::except('_token','_method','pid');
        $pid=Input::get('pid');
        $re=Books::where('id',$id)->update($input);
        if($input['book_state']==1){
            $this::checktime($input,$pid);
        }else{
            $this::delets($input);
        }
        if($re) {
            return redirect('admin/book');

        }else{
                return back()->with('errors', '修改失败');
            }
    }

    public function show(){
        //$user = Books::find(2);
        //$user->created_at = Carbon::now();
        //$user->save();
        $m= Carbon::now()->addDays(14)->timestamp;
        $n= Carbon::now()->timestamp;
        echo ($m-$n)/(60*60*24);
        echo "/n";
        echo intval(4.8);
     //  echo 'br'.date_format(Carbon::createFromDate(2018,4,28),time());
    }


    public function destroy($id){
        $products=Books::find($id);
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

    public function borrow(){
        $data=Borrows::with('books')->take(10)->get();
     return view('admin.books.borrow_index',['d'=>$data]);
    }
    public function  checktime($input,$pid=0){
        $data=Array(
            'uname'=>$input['book_name'],
            'ISBN'=>$input['book_ISBN'],
            'borrow_time'=>Carbon::now()->timestamp,
            'return_time'=>Carbon::now()->addDays(14)->timestamp,
            'author'=>$input['book_author'],
            'uid'=>$pid
        );
        $uname=Borrows::where('uname',$input['book_name']);
          if(!($uname->first())){
              $uname->create($data);
        }else{
              $uname->update($data);
        }
        if($pid){
            $dat['borrow_books']=Borrows::where('uid',$pid)->count();//当前借总数
            if(Partners::where(['id'=> $pid])->first()){    //最大可借
                $max=Partners::where(['id'=> $pid])->first()->max_booknumber;
                if($dat['borrow_books']>$max){
                    return back()->with('errors','不能再借书了，超出最大限制');
                }else{
                    Partners::where('id',$pid)->update($dat);    //更新借书的数目
                }
            }else{
                return back()->with('errors','用户ID输入有误');
            }
        }else{
            return back()->with('errors','用户ID输入有误');
        }
    }

      public function delets($input){
          Borrows::where('uname',$input['book_name'])->delete();
      }
}