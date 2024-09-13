<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reel;
use Exception;
use Illuminate\Support\Facades\Storage;

class APIController extends Controller
{
    public function uploadReel(Request $request)
    {
        try {
            $reel = new Reel();
            $reel->title = $request->input('title');
            $reel->description = $request->input('description');
            $reel->userid = $request->input('userid');
            $reel->video_url = $request->file('video')->store('reels', 'public');
            $reel->save();
            return response()->json(["status" => false, "message" => "Reel Uploaded Successfully.", "data" => $reel]);
        } catch (Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
            //throw $th;
        }
    }

    public function playReel(Request $request,$reelId)
    {
        try {
            $reel = Reel::find($reelId);
            if (!empty($reel)) {
                $video_url = url('/public').Storage::url($reel->video_url);
                return response()->json(["status" => true, "message" => "Reel Found Successfully.", "data" => $video_url]);
            } else {
                return response()->json(["status" => false, "message" => "Reel Not Found."]);
            }
        } catch (Exception $e) {
            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }
}
