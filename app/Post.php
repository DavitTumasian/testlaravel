<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 7/5/2018
 * Time: 3:01 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function canDelete(){
        if($this->user_id ==  Auth::user()->id) {
            return true;
        }
        return false;
    }
}