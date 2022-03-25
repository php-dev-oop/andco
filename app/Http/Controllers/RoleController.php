<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['permission:Roles']);

    }
    
    public function index(){
        
        $roles = Role::orderBy('id','DESC')->get();
        $breadcrums = [["name" => "Roles"]];

        return view('role.manage',compact('breadcrums','roles'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name'
        ]);

        if($validator->passes()){

            $created = Role::create([
                'name' => $request->name,
                'guard_name' => "admin"
            ]);

            if($created){
                return Redirect::route('role.manage')->with("success","Role Created successfully.");
            }else{
                return Redirect::route('role.manage')->with(["error","Role not Created."]);
            }
        }else{
            return Redirect::route('role.manage')->withErrors($validator);
        }
    }

    public function update(Request $request){

        $id = $request->role_id;
        
        $role = Role::find($id);

        if($role){
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:roles,name,'.$id
            ]);
    
            if($validator->passes()){
    
                $updated = $role->update([
                    'name' => $request->name
                ]);
    
                if($updated){
                    return Redirect::route('role.manage')->with("success","Role updated successfully.");
                }else{
                    return Redirect::route('role.manage')->with("error","Role not updated.");
                }
            }else{
                return Redirect::route('role.manage')->withErrors($validator);
            }
        }else{
            return Redirect::route('role.manage')->with("error","Role not found.");
        }
    }

    public function destroy($id){

        if(Role::destroy($id)){
            return Redirect::route('role.manage')->with("success","Role deleted successfully.");
        }else{
            return Redirect::route('role.manage')->with("error","Role is not deleted.");
        }
    }

    public function haspermission($id){

        $permissions = Permission::all();
        $role = Role::find($id);
        $haspermissions = $role->getAllPermissions();
        $breadcrums = [["name" => "Roles","link" => "role/manage"],["name" => "Has Permission"]];

        return view('role.haspermission',compact('breadcrums','permissions','role','haspermissions'));
    }
}
