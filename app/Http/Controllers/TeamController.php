<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{

    public function all_teams_api()
    {
        $teams = Team::all();
        return response()->json($teams, 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreTeamRequest $request)
    {
        //
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        //
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        //
    }

    public function destroy(Team $team)
    {
        //
    }
}
