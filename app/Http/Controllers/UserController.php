<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
       
    }

    public function createUser(Request $request)
    {
        $user = new User;
        $user->facility_id = $request->facility_id;
        $user->position_id = $request->position_id;
        $user->name = $request->name;
        $user->mail = $request->mail;
        $user->password = $request->password;
        $user->icon_image_path= $request->icon_image_path;
        $user->delete_at = $request->delete_at;
        $user->save();

        return response()->json([
            "message" => "user recode created"
        ], 201);

    }

    public function getUser($id)
    {
        
    }

    public function updateUser(Request $request, $id)
    {

    }

    public function editUser(Request $request, $id)
    {

    }

    public function deleteUser($id)
    {

    }

}
