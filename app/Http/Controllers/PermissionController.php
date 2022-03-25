<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['permission:Permissions']);

    }

    public function index()
    {

        $permissions = Permission::orderBy('id', 'DESC')->get();
        $breadcrums = [["name" => "Permissions"]];

        return view('permission.manage', compact('breadcrums', 'permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:permissions,name'
        ]);

        if ($validator->passes()) {

            $created = Permission::create([
                'name' => $request->name,
                'guard_name' => "admin"
            ]);

            if ($created) {
                return Redirect::route('permission.manage')->with("success", "Permission Created successfully.");
            } else {
                return Redirect::route('permission.manage')->with(["error", "Permission not Created."]);
            }
        } else {
            return Redirect::route('permission.manage')->withErrors($validator);
        }
    }

    public function update(Request $request)
    {

        $id = $request->permission_id;

        $permission = Permission::find($id);

        if ($permission) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:permissions,name,' . $id
            ]);

            if ($validator->passes()) {

                $updated = $permission->update([
                    'name' => $request->name
                ]);

                if ($updated) {
                    return Redirect::route('permission.manage')->with("success", "Permission updated successfully.");
                } else {
                    return Redirect::route('permission.manage')->with("error", "Permission not updated.");
                }
            } else {
                return Redirect::route('permission.manage')->withErrors($validator);
            }
        } else {
            return Redirect::route('permission.manage')->with("error", "Permission not found.");
        }
    }

    public function destroy($id)
    {

        if (Permission::destroy($id)) {
            return Redirect::route('permission.manage')->with("success", "Permission deleted successfully.");
        } else {
            return Redirect::route('permission.manage')->with("error", "Permission is not deleted.");
        }
    }
}
