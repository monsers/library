<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Books extends Model
{
    protected $table = 'books';
    protected $dateFormat = 'U';
    protected $guarded = [];//排除create不能填充的字段
//    public function comments()   关联
//    {
//        return $this->hasMany('App\Title');
//    }
      public function borrows(){
      return $this->hasOne('App\Borrows','uname','book_name');
      }

}