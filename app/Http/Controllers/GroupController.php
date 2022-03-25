<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Groupinvitation;

class GroupController extends Controller
{
    public function index()
    {

        $groups = Group::with('user')->withCount('invited')->orderBy('id', 'DESC')->get();
        $breadcrums = [["name" => "Groups"]];
        return view('group.manage', compact('breadcrums', 'groups'));
    }

    public function groupinvitations($id)
    {

        $groupsinvitations = Groupinvitation::with('user', 'group', 'approvedby')->where('group_id', $id)->get();

        return json_encode($groupsinvitations);
    }
}
