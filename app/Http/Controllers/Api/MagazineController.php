<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::all();
        if ($magazines) {
            $response = ["type" => "success", "message" => "Got all groups", "data" => $magazines];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Something went wrong. Groups not found."];
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
            'phrase' => 'required',
        ]);
        if ($validator->passes()) {
            $magazine = new Magazine();
            $magazine->user_id = $request->user_id;
            $magazine->group_id = $request->group_id;
            $magazine->title = $request->title;
            $magazine->phrase = $request->phrase;
            $magazineadded = $magazine->save();
            if ($magazineadded) {
                $response = ["type" => "success", "message" => "Magazine added successfully.", "data" => $magazine];
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
        $magazine = MAgazine::find($id);
        if ($magazine) {
            $response = ["type" => "success", "message" => "Group found successfully with the ID-" . $id . ".", "data" => $magazine];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Group not found with the ID-" . $id . "."];
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'phrase' => 'required',
        ]);
        if ($validator->passes()) {
            $magazine = Magazine::find($id);
            $magazine->user_id = $request->user_id;
            $magazine->group_id = $request->group_id;
            $magazine->title = $request->title;
            $magazine->phrase = $request->phrase;
            $magazineupdated = $magazine->update();
            if ($magazineupdated) {
                $response = ["type" => "success", "message" => "Magazine added successfully.", "data" => $magazine];
                return response($response, 201);
            }
        } else {
            $response = ["type" => "error", "message" => $validator];
            return response($response, 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getmagazine($id){
        $posts = Post::where('group_id', $id)->get();
        // $data = [

        //     'title' => 'Welcome to ItSolutionStuff.com',

        //     'date' => date('m/d/Y')

        // ];
        $response = ["type" => "success", "message" => "PDF is here", "data" => $posts];
        return response($response, 201);

        // $pdf = PDF::loadView('myPDF', $data);
        // dd($pdf);
        // dd($posts);
    }






}
