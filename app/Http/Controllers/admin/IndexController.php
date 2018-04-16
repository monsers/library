<?php

namespace App\Http\Controllers\Admin;
use App\Books;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller{
    public function index(){
       return view('admin.index');
//        echo Auth::user();
    }

    public function Searchs(){
        $keywords=Input::get('keywords');
        $content=Books::where('book_name','like',$keywords.'%')
            ->orWhere('book_author','like',$keywords.'%')->get();
        return view('admin.books.index',['d'=>$content]);
    }
}