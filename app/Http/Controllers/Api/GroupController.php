<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;
use App\Models\Groupinvitation;
use Illuminate\Support\Facades\Mail;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        if ($groups) {
            $response = ["type" => "success", "message" => "Got all groups", "data" => $groups];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Something went wrong. Groups not found."];
            return response($response, 400);
        }
    }

    public function show($id)
    {

        $group = Group::find($id);
        if ($group) {
            $response = ["type" => "success", "message" => "Group found successfully with the ID-" . $id . ".", "data" => $group];
            return response($response, 201);
        } else {
            $response = ["type" => "error", "message" => "Group not found with the ID-" . $id . "."];
            return response($response, 400);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $random_group_code = Str::random(5);

            $group = Group::create([
                'name' => $request->name,
                'code' => $random_group_code,
                'user_id' => $request->created_by,
                'new_user_role' => $request->default_role,
                'image' => $request->image,
            ]);

            if ($group) {
                $response = ["type" => "success", "message" => "Group added successfully.", "data" => $group];
                return response($response, 201);
            }
        } else {
            $response = ["type" => "error", "message" => $validator];
            return response($response, 400);
        }
    }

    public function update(Request $request, $id)
    {

        $group = Group::find($id);
        if ($group) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255'
            ]);

            if ($validator->passes()) {

                $group->update([
                    'name' => $request->name,
                    'user_id' => $request->created_by,
                    'new_user_role' => $request->default_role,
                    'image' => $request->image,
                ]);

                if ($group) {
                    $response = ["type" => "success", "message" => "Group updated successfully.", "data" => $group];
                    return response($response, 201);
                }
            } else {
                $response = ["type" => "error", "message" => $validator];
                return response($response, 400);
            }
        } else {
            $response = ["type" => "error", "message" => "Group not found with this id."];
            return response($response, 400);
        }
    }


    public function destroy($id)
    {

        $group = Group::find($id);
        if ($group) {
            if ($group->delete()) {
                $response = ["type" => "success", "message" => "Group deleted successfully."];
                return response($response, 201);
            } else {
                $response = ["type" => "error", "message" => "Group not deleted."];
                return response($response, 400);
            }
        } else {
            $response = ["type" => "error", "message" => "Group not found with this id."];
            return response($response, 400);
        }
    }

    public function invitation(Request $request, $id)
    {
        $group = Group::find($id);
        if ($group) {

            // dd($request->emails);

            $emails = explode(",", $request->emails);

            foreach ($emails as $email) {

                $group_invitation = Groupinvitation::create([
                    "user_id" => $request->invited_by,
                    "group_id" => $request->group_id,
                    "email" => $email,
                    "role" => $group->new_user_role,
                ]);

                if ($group_invitation) {
                    //Send Inivitation Email
                    //$mailsent = Mail::to($email)->send(new GroupInvitationMail($group));
                }
            }

            if ($group) {
                $response = ["type" => "success", "message" => "Group deleted successfully."];
                return response($response, 201);
            } else {
                $response = ["type" => "error", "message" => "Group not deleted."];
                return response($response, 400);
            }
        } else {
            $response = ["type" => "error", "message" => "Group not found with this id."];
            return response($response, 400);
        }
    }
}
