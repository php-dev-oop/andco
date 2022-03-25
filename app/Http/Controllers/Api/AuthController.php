<?php

die();

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Groupinvitation;
use App\Models\Joingroup;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        //dd($request);

        //Validate inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on users table'
        ]);

        //check email
        $user = User::where("email", $request->email)->first();
        //echo "<h1>$request->email</h1>";
        die();



        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => 'bad creds'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

        //  $creds = $request->only('email','password');

        //  if( Auth::guard('web')->attempt($creds) ){
        //      return redirect()->route('user.home');
        //  }else{
        //      return redirect()->route('user.login')->with('fail','Incorrect credentials');
        //  }

    }

    public function register(Request $request)
    {
        dd($request);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'date_of_birth' => 'required|min:8',
        ]);

        if ($validator->passes()) {

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'display_name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                return json_encode(["success" => "User created successfully."]);
            } else {
                return json_encode(["error" => "User not created."]);
            }
        } else {
            return json_encode($validator);
        }
    }


    //Join Group Function
    public function joinGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'date_of_birth' => 'required|min:8',
        ]);

        if ($validator->passes()) {

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'display_name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {

                $group = Groupinvitation::where('email', $request->email)->first();

                if ($group) {
                    $group->where('id', $group->id)->update(['status' => '1']);
                    return json_encode(["success" => "status changed."]);
                } else {

                    $grp_id = Group::first();

                    $joinGroup = new Joingroup();
                    $joinGroup->user_id = $user->id;
                    $joinGroup->group_id = $grp_id->id;
                    $res = $joinGroup->save();
                    if ($res) {
                        return json_encode(["success" => "saved successfully."]);
                    }
                }

                // return json_encode(["success" => "User created successfully."]);
            } else {
                return json_encode(["error" => "User not created."]);
            }
        } else {
            return json_encode($validator);
        }
    }
}
