<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;

class FacilityController extends Controller
{
    public function getAllFacilities()
    {
        $facilities = Facility::get()->toJson(JSON_PRETTY_PRINT);
        return response($facilities, 200);
    }

    public function createFacility(Request $request)
    {
        $facility = new Facility;
        $facility->facility_name = $request->facility_name;
        $facility->corporation = $request->corporation;
        $facility->delete_at = $request->delete_at;
        $facility->save();

        return response()->json([
            "message" => "facility recode created"
        ], 201);
    }

    public function getFacility($id)
    {
        if (Facility::where('id', $id)->exists()) {
            $facility = Facility::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($facility, 200);
          } else {
            return response()->json([
              "message" => "Facility not found"
            ], 404);
          }
    }
    public function updateFacility(Request $request, $id)
    {
        if (Facility::where('id', $id)->exists()) {
            $facility = Facility::find($id);
            $facility->facility_name= is_null($request->facility_name) ? $facility->facility_name : $request->facility_name;
            $facility->corporation= is_null($request->corporation) ? $facility->corporation : $request->corporation;
            $facility->delete_at= is_null($request->delete_at) ? $facility->delete_at : $request->delete_at;
            $facility->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Facility not found"
            ], 404);
            }
    }

    public function editFacility(Request $request, $id)
    {

    }

    public function deleteFacility($id)
    {
        if(Facility::where('id', $id)->exists()) {
            $facility = Facility::find($id);
            $facility->delete();
      
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Facility not found"
            ], 404);
          }
    }

}
