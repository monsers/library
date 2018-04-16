<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Borrows extends Model
{
    protected $table = 'book_borrow';
    protected $dateFormat = 'U';
    public $timestamps=false;
    protected $guarded = [];//排除create不能填充的字段
//    public function comments()   关联
//    {
//        return $this->hasMany('App\Title');
//    }

      public function books(){
          return $this->belongsTo('App\Books','uname','book_name');
      }

    public function partners(){
        return $this->belongsTo('App\Books','uid','id');
    }

}