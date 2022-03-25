<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){

        // SELECT posts.*,groups.name,users.display_name,COUNT(post_id) as post_likes FROM posts 
        // INNER JOIN post_likes on posts.id = post_likes.post_id 
        // INNER JOIN groups on groups.id = posts.group_id 
        // INNER JOIN users on users.id = posts.user_id; 

        // $posts = Post::join('post_likes','posts.id','post_likes.post_id')->
        // join('groups','groups.id','posts.group_id')->
        // join('users','users.id','posts.user_id')->
        // select(array('posts.*','groups.name','users.display_name', DB::raw('COUNT(post_likes.post_id) as likes_count')))->
        // groupBy('post_likes.post_id')->get();

        // $posts = Post::with('users','groups','post_likes')->get();
        
        // dd($posts);

        $posts = Post::with('group','user')->withCount('likes')->orderBy('id','DESC')->get();
        $breadcrums = [["name" => "Posts"]];
        return view('post.manage',compact('breadcrums','posts'));
    }
}
