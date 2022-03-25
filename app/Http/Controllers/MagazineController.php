<?php

namespace App\Http\Controllers;

use App\Models\Magazine;

class MagazineController extends Controller
{
    public function index(){

        $magazines = Magazine::with('group','user')->orderBy('id','DESC')->get();
        $breadcrums = [["name" => "Magazines"]];
        return view('magazine.manage',compact('breadcrums','magazines'));
    }
}
