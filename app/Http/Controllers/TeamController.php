<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function team(){
        return view('pages.dashboard.team');
    }

    function team_create(Request $request){
        $img = $request->file('img');
        $img_name = $img->getClientOriginalName();
        $img->move(public_path('upload/team'), $img_name);

        Team::create([
            'name'=>$request->name,
            'role'=>$request->role,
            'img'=>$img_name,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Member added Successful!',
        ]);
    }

    function get_team(){
        return Team::all();
    }

    function team_delete(Request $request){
        $present = Team::find($request->team_id);
        if($present->img != null){
            unlink(public_path('upload/team/'.$present->img));
        }
        Team::find($request->team_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function team_update(Request $request){
        if($request->hasFile('img')){
            $present = Team::find($request->team_id);
            if($present->img != null){
                unlink(public_path('upload/team/'.$present->img));
            }
            
            $img = $request->file('img');
            $img_name = $img->getClientOriginalName();
            $img->move(public_path('upload/team'), $img_name);
            Team::find($request->team_id)->update([
                'img'=>$img_name,
            ]);

        }
        Team::find($request->team_id)->update([
            'name'=>$request->name,
            'role'=>$request->role,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Member Updated Successful!',
        ]);

    }
}
