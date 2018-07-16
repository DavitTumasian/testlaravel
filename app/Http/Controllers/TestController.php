<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 7/5/2018
 * Time: 2:29 PM
 */

namespace App\Http\Controllers;


use App\Post;



class TestController extends Controller
{
    public function index(){
        $posts = Post::orderByRaw('updated_at DESC')->with('user')->get();
        return view('test')->with(['posts'=> $posts]);
    }
}