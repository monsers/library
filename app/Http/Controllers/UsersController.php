<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $timestamps = false;//created_at不创建
    public function index(){
        return view('admin.login');
    }
    public function save(){
        $users = DB::table('users')->get();
        var_dump($users);
    }
}
