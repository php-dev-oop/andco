<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fact;

class FactController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['permission:Facts']);
    }

    public function index(){

        $facts = Fact::orderBy('id','DESC')->get();

        $breadcrums = [["name" => "Facts"]];
        
        return view('fact.manage',compact('breadcrums','facts'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        if($validator->passes()){

            $created = Fact::create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            if($created){
                return Redirect::route('fact.manage')->with("success","Fact Created successfully.");
            }else{
                return Redirect::route('fact.manage')->with(["error","Fact not Created."]);
            }
        }else{
            return Redirect::route('fact.manage')->withErrors($validator);
        }
    }

    public function update(Request $request){

        $id = $request->fact_id;
        $fact = Fact::find($id);

        if($fact){
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required|string'
            ]);
    
            if($validator->passes()){
    
                $updated = $fact->update([
                    'title' => $request->title,
                    'content' => $request->content
                ]);
    
                if($updated){
                    return Redirect::route('fact.manage')->with("success","Fact updated successfully.");
                }else{
                    return Redirect::route('fact.manage')->with("error","Fact not updated.");
                }
            }else{
                return Redirect::route('fact.manage')->withErrors($validator);
            }
        }else{
            return Redirect::route('fact.manage')->with("error","Fact with this ID is not found.");
        }
    }

    public function destroy($id){

        if(Fact::destroy($id)){
            return Redirect::route('fact.manage')->with("success","Fact deleted successfully.");
        }else{
            return Redirect::route('fact.manage')->with("error","Fact is not deleted.");
        }
    }

}
