<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 7/6/2018
 * Time: 3:38 PM
 */

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $posts = Post::with("user")->get();
        return view('admin')->with(['posts' => $posts]);
    }

    public function edit($id){
        $post = Post::with('user')->find($id);
        return view('editPost')->with(['post'=>$post]);
    }

    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect(route('admin'));
    }

    public function save(Request $request){
        $request->validate([
            'newBody' => 'required'
        ]);

        $body =$request->newBody;
        $id =$request->id;

        Post::where('id', $id)->update(['body'=>$body]);
        return redirect(route('admin'));

    }

}