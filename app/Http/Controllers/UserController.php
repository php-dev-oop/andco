<?php

namespace App\Http\Controllers;

use App\Mail\EmailUserCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Storage;

class UserController extends Controller
{
    public function index()
    {

        $breadcrums = [["name" => "Users"]];
        $users = User::orderBy('id', 'DESC')->get();
        $roles = Role::all();

        return view('user.manage', compact('breadcrums', 'users', 'roles'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
        ]);

        if ($validator->passes()) {

            $random_password = Str::random(8);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'display_name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'password' => Hash::make($random_password),
            ]);

            if ($user) {

                $role = Role::find($request->role_id);
                $user->assignRole($role);

                //Send Email Code
                $data = [
                    "Subject" => "",
                    "UserName" => $request->first_name . ' ' . $request->last_name,
                    "Email" => $request->email,
                    "Password" => $random_password
                ];

                $sendmail = Mail::to($request->email)->send(new EmailUserCredentials($data));

                if ($sendmail) {
                }

                return Redirect::route('user.manage')->with("success", "User created successfully.");
            } else {
                return Redirect::route('user.manage')->with("error", "User not created.");
            }
        } else {
            return Redirect::route('user.manage')->withErrors($validator);
        }
    }

    public function edit($id)
    {

        $user = User::find($id);

        return view('user.manage', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if ($user) {

            $validator = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users,email' . $id,
            ]);

            if ($validator->passes()) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'display_name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'date_of_birth' => $request->date_of_birth,
                ]);

                if ($user) {
                    return Redirect::back()->with("message", "User updated successfully.");
                } else {
                    return Redirect::back()->with("message", "User not updated.");
                }
            } else {
                return Redirect::back()->withErrors($validator);
            }
        } else {
            return Redirect::back()->with("message", "User not found.");
        }
    }

    public function destroy($id)
    {

        $user = User::find($id);

        if ($user->destroy()) {
            return Redirect::back()->with("message", "User deleted successfully.");
        } else {
            return Redirect::back()->with("message", "User is not deleted.");
        }
    }

    public function profile()
    {
        $user = User::find(Auth()->user()->id);

        return view('user.profile', compact('user'));
    }

    public function updateProfile()
    {
        return view('user.profile');
    }

    public function changePassword()
    {

        return view('user.changePassword');
    }

    public function updatePassword()
    {
        return view('user.changePassword');
    }
}
