<?php

namespace App\Http\Controllers;
use Image;
use App\Team;
use App\Http\Requests\StoreTeam;
use App\Http\Requests\UpdateTeam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get(['id', 'name', 'designation' ]);

        return view('backend.team.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.team.create');
    }

    public function store(StoreTeam $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $team = Team::create($data);

            $this->uploadRequestImage($request, $team);
        });
        return redirect()->route('team.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Team' ]));
    }
    public function edit(Team $team)
    {
        return view('backend.team.edit', compact('team'));
    }

    public function update (Updateteam $request, Team $team)
    {
        DB::transaction(function () use ($request, $team)
        {
            $data = $request->data();

            $team->update($data);
            $this->uploadRequestImage($request, $team);
        });

        return redirect()->route('team.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Team' ]));
    }
    public function destroy(Team $team)
    {
        $team->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Team' ]));
    }
}
