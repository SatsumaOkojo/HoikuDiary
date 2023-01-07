<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function getAllUsers()
    {
         $users = User::get()->toJson(JSON_PRETTY_PRINT);
         return response($users, 200); 
    }

    public function createUser(Request $request)
    {
        $user = new User;
        $user->facility_id = $request->facility_id;
        $user->position_id = $request->position_id;
        $user->name = $request->name;
        $user->mail = $request->mail;
        $user->password = $request->password;
        $user->icon_image_path = $request->icon_image_path;
        $user->delete_at = $request->delete_at;
        $user->save();

        return response()->json([
            "message" => "user recode created"
        ], 201);

    }
  
    public function getUser($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);  
           }
   }
  
   
   public function loginCheck(Request $request)
   {
     $credentials = $request->validate([
       'email' => ['required', 'email'],
       'password' => ['required'],
     ]);
     
     if (Auth::attempt($credentials)) {
       $request->session()->regenerate();

       return redirect()->intended('dashboard');
   }

   return back()->withErrors([
       'email' => 'The provided credentials do not match our records.',
   ]);
   }

   

    public function updateUser(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->facility_id = is_null($request->facility_id) ? $user->facility_id : $request->facility_id;
            $user->position_id = is_null($request->position_id) ? $user->position_id : $request->position_id;
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->mail = is_null($request->mail) ? $user->mail : $request->mail;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->icon_image_path = is_null($request->icon_image_path) ? $user->icon_image_path : $request->icon_image_path;
            $user->delete_at = is_null($request->delete_at) ? $user->delete_at : $request->delete_at;
            $user->save();

                  
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
            }
    }

    public function editUser(Request $request, $id)
    {

    }

    public function deleteUser($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();
      
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
    }

  }
