<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Position;


class MessageController extends Controller
{
    public function getAllMessages()
    {
        $messages = Message::get()->toJson(JSON_PRETTY_PRINT);
        return response($messages, 200);
    }



    public function getMessagesItems($id)
    {
        $user = User::where('id', $id)->first();


        $facility_users= User::where('facility_id', $user->facility_id)->get();


        $mainpage_items = [];
    
        foreach($facility_users as $facility_user){
            
              $message = Message::where('user_id', $facility_user->id)->first();
        
      
              $position = Position::where('id',$facility_user->position_id)->first();

              array_push($mainpage_items, [
                "name" => $facility_user->name,
                "position_name" => $position->position_name,
                "message" => $message->message,
                "updated_at" => $message->updated_at,
             ]);
        }
        return response($mainpage_items, 200);
    
    }
    public function createMessage(Request $request)
    {
        $message = new Message;
        $message->facility_id = $request->facility_id;
        $message->user_id = $request->user_id;
        $message->message = $request->message;
        $message->delete_at = $request->delete_at;
        $message->save();

        return response()->json([
            "message" => "message recode created"
        ], 201);
    }

    public function getMessage($id)
    {
        if (Message::where('id', $id)->exists()) {
            $message = Message::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($message, 200);
          } else {
            return response()->json([
              "message" => "Message not found"
            ], 404);
          }
    }

    public function updateMessage(Request $request, $id)
    {
        if (Message::where('id', $id)->exists()) {
            $message = Message::find($id);
            $message->facility_id= is_null($request->facility_id) ? $message->facility_id : $request->facility_id; 
            $message->user_id= is_null($request->user_id) ? $message->user_id : $request->user_id;
            $message->message= is_null($request->message) ? $message->message : $request->message;
            $message->delete_at= is_null($request->delete_at) ? $message->delete_at : $request->delete_at;
            $message->save();

            
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Message not found"
            ], 404);
            }
    }

    public function editMessage(Request $request, $id)
    {

    }

    public function deleteMessage($id)
    {
        if(Message::where('id', $id)->exists()) {
            $message = Message::find($id);
            $message->delete();
      
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Message not found"
            ], 404);
          }
    }

}
