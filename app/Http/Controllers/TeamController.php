<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Auth;
class TeamController extends Controller
{

    public function all_teams_api()
    {
        $teams = Team::all();
        return response()->json($teams, 200);
    }

    public function all_teams()
    {
        $teams = Team::all();
        return view('backend.teams.all_team' , compact('teams'));
    }

    public function create()
    {
        return view('backend.teams.add_person');
    }

    public function store(StoreTeamRequest $request)
    {
        $name              = $request->name;
        $desc              = $request->desc;
        $position          = $request->position;
        $user_id           = Auth::user()->id;
        $person_image      = $request->file('image');

 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($person_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $person_image->move($upload_location,$img_name); 

        $teams = Team::create([
            'name'       => $name,
            'desc'       => $desc,
            'position'   => $position,
            'user_id'    => $user_id,
            'image'      => $image,
        ]);

        return redirect()->route('dashboard.team.all_team')->with('message' , 'the person is added successfully');
    }


    public function edit($id)
    {
        $team = Team::find($id);
        return view('backend.teams.edit_person' , compact('team'));
    }

    public function update(UpdateTeamRequest $request, $id)
    {
        $team = Team::find($id);

        $name              = $request->name;
        $desc              = $request->desc;
        $position          = $request->position;
        $user_id           = Auth::user()->id;
        $person_image      = $request->file('image');

 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($person_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $person_image->move($upload_location,$img_name); 

        $team->update([
            'name'       => $name,
            'desc'       => $desc,
            'position'   => $position,
            'user_id'    => $user_id,
            'image'      => $image,
        ]);
        return redirect()->route('dashboard.team.all_team')->with('message' , 'the person is update successfully');

    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('dashboard.team.all_team')->with('message' , 'the person is deletes successfully');

    }
}
