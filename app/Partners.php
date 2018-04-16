<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Partners extends Model
{
    protected $table = 'mypartner';
    protected $dateFormat = 'U';
    public $timestamps=false;
    protected $guarded = [];//排除create不能填充的字段
//    public function comments()   关联
//    {
//        return $this->hasMany('App\Title');
//    }

     public function borrows(){
     return $this->hasMany('App\Borrows','uid','id');
     }

}