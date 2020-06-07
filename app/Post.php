<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
class Post extends Model
{
//    //
//    protected $table='posts';
//    protected $primaryKey ='id';
      use SoftDeletes ;
      protected $dates=['deleted_at'];  //why we make that variable
      protected $fillable=[
          'title',
          'content',
          'user_id'
      ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photos(){
        return $this->morphMany('App\Photo','imageable');
    }
    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
    public static function scopeLatest(Builder $query){
        return $query->orderBy('title','desc');
    }

}
