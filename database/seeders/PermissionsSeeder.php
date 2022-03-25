<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Admin side Module Permissions
            //Permission
            ["name"=>"permission_add", "guard_name"=>"admin"],
            ["name"=>"permission_edit", "guard_name"=>"admin"],
            ["name"=>"permission_delete", "guard_name"=>"admin"],
            ["name"=>"permission_view", "guard_name"=>"admin"],

            //Role
            ["name"=>"role_add", "guard_name"=>"admin"],
            ["name"=>"role_edit", "guard_name"=>"admin"],
            ["name"=>"role_delete", "guard_name"=>"admin"],
            ["name"=>"role_view", "guard_name"=>"admin"],

            //User
            ["name"=>"user_add", "guard_name"=>"admin"],
            ["name"=>"user_edit", "guard_name"=>"admin"],
            ["name"=>"user_delete", "guard_name"=>"admin"],
            ["name"=>"user_view", "guard_name"=>"admin"],

            //Notification
            ["name"=>"notification_add", "guard_name"=>"admin"],
            ["name"=>"notification_edit", "guard_name"=>"admin"],
            ["name"=>"notification_delete", "guard_name"=>"admin"],
            ["name"=>"notification_view", "guard_name"=>"admin"],

            //Shipping Address
            ["name"=>"address_add", "guard_name"=>"admin"],
            ["name"=>"address_edit", "guard_name"=>"admin"],
            ["name"=>"address_delete", "guard_name"=>"admin"],
            ["name"=>"address_view", "guard_name"=>"admin"],

            //Payment Details
            ["name"=>"payment_add", "guard_name"=>"admin"],
            ["name"=>"payment_edit", "guard_name"=>"admin"],
            ["name"=>"payment_delete", "guard_name"=>"admin"],
            ["name"=>"payment_view", "guard_name"=>"admin"],

            //Groups
            ["name"=>"group_add", "guard_name"=>"admin"],
            ["name"=>"group_edit", "guard_name"=>"admin"],
            ["name"=>"group_delete", "guard_name"=>"admin"],
            ["name"=>"group_view", "guard_name"=>"admin"],

            //Group Invitations
            ["name"=>"group_invite_add", "guard_name"=>"admin"],
            ["name"=>"group_invite_edit", "guard_name"=>"admin"],
            ["name"=>"group_invite_delete", "guard_name"=>"admin"],
            ["name"=>"group_invite_view", "guard_name"=>"admin"],

            //Posts
            ["name"=>"post_add", "guard_name"=>"admin"],
            ["name"=>"post_edit", "guard_name"=>"admin"],
            ["name"=>"post_delete", "guard_name"=>"admin"],
            ["name"=>"post_view", "guard_name"=>"admin"],

            //Post Liked
            ["name"=>"post_liked_add", "guard_name"=>"admin"],
            ["name"=>"post_liked_edit", "guard_name"=>"admin"],
            ["name"=>"post_liked_delete", "guard_name"=>"admin"],
            ["name"=>"post_liked_view", "guard_name"=>"admin"],

            //Magazines
            ["name"=>"magazines_add", "guard_name"=>"admin"],
            ["name"=>"magazines_edit", "guard_name"=>"admin"],
            ["name"=>"magazines_delete", "guard_name"=>"admin"],
            ["name"=>"magazines_view", "guard_name"=>"admin"],

            //Facts
            ["name"=>"fact_add", "guard_name"=>"admin"],
            ["name"=>"fact_edit", "guard_name"=>"admin"],
            ["name"=>"fact_delete", "guard_name"=>"admin"],
            ["name"=>"fact_view", "guard_name"=>"admin"],

            //Web side Permissions
            //Admin / Payer
            // ["name"=>"posts", "guard_name"=>"web"],
            // ["name"=>"managzines", "guard_name"=>"web"],
            // ["name"=>"post_likes", "guard_name"=>"web"],
            // ["name"=>"groups", "guard_name"=>"web"],
            // ["name"=>"groups", "guard_name"=>"web"],
            //Publisher

            //Viewer
            
        ];

        foreach($permissions as $permission){
            
        }
    }
}
