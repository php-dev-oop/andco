<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Postlike;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        if ($posts) {
            $response = ["type" => "success", "message" => "Got all posts", "data" => $posts];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Something went wrong. Posts not found."];
            return response($response, 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        if ($validator->passes()) {

            $group = Post::create([
                'image' => $request->image,
            ]);

            if ($group) {
                $response = ["type" => "success", "message" => "Post added successfully.", "data" => $post];
                return response($response, 201);
            }
        } else {
            $response = ["type" => "error", "message" => $validator];
            return response($response, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            $response = ["type" => "success", "message" => "Post found successfully with the ID-" . $id . ".", "data" => $post];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Post not found with the ID-" . $id . "."];
            return response($response, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            if ($post->delete()) {
                $response = ["type" => "success", "message" => "Post deleted successfully."];
                return response($response, 201);
            } else {
                $response = ["type" => "error", "message" => "Post not deleted."];
                return response($response, 400);
            }
        } else {
            $response = ["type" => "error", "message" => "Post not found with this id."];
            return response($response, 400);
        }
    }

    public function alllikedposts($group_id, $user_id)
    {
        $likedposts = Postlike::where("group_id", $group_id)->where("user_id", $user_id)->get();
    }
}
