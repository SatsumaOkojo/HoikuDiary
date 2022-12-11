<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class ProposalController extends Controller
{
    public function getAllProposals()
    {
        $proposals = Proposal::get()->toJson(JSON_PRETTY_PRINT);
        return response($proposals, 200);
    }

    public function createProposal(Request $request)
    {
        $proposal = new Proposal;
        $proposal->event_name = $request->event_name;
        $proposal->schedule = $request->schedule;
        $position->proposal_image_path = $request->proposal_image_path;
        $proposal->delete_at = $request->delete_at;
        $position->save();

        return response()->json([
            "message" => "proposal recode created"
        ], 201);

    }

    public function getProposal($id)
    {
        if (Proposal::where('id', $id)->exists()) {
            $proposal = Proposal::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($proposal, 200);
          } else {
            return response()->json([
              "message" => "Proposal not found"
            ], 404);
          }
    }
    public function updateProposal(Request $request, $id)
    {
        if (Proposal::where('id', $id)->exists()) {
            $proposal = Proposal::find($id);
            $proposal->event_name = is_null($request->event_name) ? $proposal->event_name : $request->event_name;
            $proposal->schedule = is_null($request->schedule) ? $proposal->schedule : $request->schedule;
            $proposal->proposal_image_path = is_null($request->proposal_image_path) ? $proposal->proposal_image_path : $request->proposal_image_path;
            $proposal->delete_at = is_null($request->delete_at) ? $proposal->delete_at : $request->delete_at;
            $proposal->save();
            
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Proposal not found"
            ], 404);
            }
    }

    public function editProposal(Request $request, $id)
    {

    }

    public function deleteProposal($id)
    {
        if(Proposal::where('id', $id)->exists()) {
            $proposal = Proposal::find($id);
            $proposal->delete();
      
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Proposal not found"
            ], 404);
          }
    }

}
