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

    public function getMessageItems()
    {

        $messages = Message::get()->toJson(JSON_PRETTY_PRINT);
        $positions = Position::get()->toJson(JSON_PRETTY_PRINT);
        $users = User::get()->toJson(JSON_PRETTY_PRINT);

      if ($users->id == $messages->user_id && $users->position_id == $positions->id) {
        $messages = Message::where('user_id', $user_id)->get()->toJson(JSON_PRETTY_PRINT);
        $messages = Message::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        $users = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        $users = User::where('position_id', $position_id)->get()->toJson(JSON_PRETTY_PRINT);
        $positions = Position::where('position_name', $position_name)->get()->toJson(JSON_PRETTY_PRINT);

        return response($messages,$users,$positions, 200);
      } else {
        return response()->json([
          "message" => "取得できませんでした"
        ], 404);
      }

      $userMessageItems = [
        "name" = $user->name;
        "position_name" = $position->position_name;
        "messsage" = $message->message;
        "updated_at" = $message->updated_at;
      ]
        

      // array_column ( $配列 , $取り出すカラム名 [, $インデックスに指定するカラム名] )

        // if (Userテーブルのid == Messageテーブルのuser_id && Userテーブルのposition_id == Positionテーブルのid(User::where('id', $id)->exists())) {
        //   $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        //   return response($user, 200);}
        //   {  if (Message::where('user_id', $user_id)->exists()) {
        //     $message = Message::where('user_id', $user_id)->get()->toJson(JSON_PRETTY_PRINT);
        //     return response($message, 200);
        //   }  {  if (Position::where('id', $id)->exists()) 
        //       $position = Position::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        //       return response($position, 200);
        //     } else {
        //       return response()->json([
        //         "message" => "Item取得できませんでした"
        //       ], 404);
        //     }
        //   }
        }
      
    //     if(Userelement.id === Positionelement.user_id && Userelement.position_id === Positionelement.id){
    //       // UserテーブルのidとMessageテーブルのuser_idが合った場合
    //       // Userテーブルのposition_idとPositionテーブルのidが合った場合それに対するposition_nameを割り出す
    //     }
    //     {
    //       return response()->json( [
    //       "message" => "Item取得できました"
    //   ], 201);
    //        } else {
    //     return response()->json([
    //       "message" => "Item取得できませんでした"
    //     ], 404);
    //   }
    // }

  


    // $result = array_filter($data, function($k) {
    //   return (substr($k, -5) == '_name');
    //   }, ARRAY_FILTER_USE_KEY);

 
        
    

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
