<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Team;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    function skills($id)
    {
        $team_info = Team::find($id);
        return view('pages.dashboard.skill', compact('team_info'));
    }
    function skill_create(Request $request)
    {
        Skill::create([
            'team_id' => $request->team_id,
            'skill' => $request->skill,
        ]);
        return  response()->json([
            'status' => 'success',
            'message' => 'Skill Added Successfull!',
        ]);
    }

    function get_skill(Request $request)
    {
        $skills = Skill::join('teams', 'skills.team_id', '=', 'teams.id')
            ->select('skills.*', 'teams.name as team_name')
            ->get();

        return response()->json($skills);
    }

    function skill_delete(Request $request)
    {
        Skill::find($request->skill_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
