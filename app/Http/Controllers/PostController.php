<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 7/5/2018
 * Time: 5:00 PM
 */

namespace  App\Http\Controllers;




use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        return view('postForm');
    }

    public function add(Request $request){

        $request->validate([
            'body' => 'required'
        ]);

        $post = new Post;

        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        $msg = 'Something went wrong.';

        if($post->save()){
            $msg = 'Added new post.';
        }

        //return back();
        return redirect(route('test'))->with('global', $msg);
    }

    public function delete($id){

        $post = Post::find($id);

        if($post->canDelete()){
            $post->delete();
        }
        return back();

    }


}