<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    public function getAllPositions()
    {
        $positions = Position::get()->toJson(JSON_PRETTY_PRINT);
        return response($positions, 200);  
    }

    public function createPosition(Request $request)
    {
        $position = new Position;
        $position->position_name = $request->position_name;
        $position->author_id = $request->author_id;
        $position->delete_at = $request->delete_at;
        $position->save();

        return response()->json([
            "message" => "position recode created"
        ], 201);

    }

    public function getPosition($id)
    {
        if (Position::where('id', $id)->exists()) {
            $position = Position::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($position, 200);
          } else {
            return response()->json([
              "message" => "Position not found"
            ], 404);
          }
    }
    public function updatePosition(Request $request, $id)
    {
        if (Proposal::where('id', $id)->exists()) {
            $position = Position::find($id);
            $position->position_name = is_null($request->position_name) ? $position->position_name : $request->position_name;
            $position->author_id = is_null($request->author_id) ? $position->author_id : $request->author_id;
            $position->delete_at = is_null($request->delete_at) ? $position->delete_at : $request->delete_at;
            $position->save();
            
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Position not found"
            ], 404);
             }
    }
    public function editPosition(Request $request, $id)
    {

    }

    public function deletePosition($id)
    {
        if(Position::where('id', $id)->exists()) {
            $position = Position::find($id);
            $position->delete();
      
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Position not found"
            ], 404);
          }
    }

}
