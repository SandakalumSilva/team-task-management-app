<?php

namespace App\Repositories;

use App\Interfaces\TeamInterface;
use App\Models\Team;
use Yajra\DataTables\Facades\DataTables;

class TeamRepository implements TeamInterface
{
    public function index()
    {
        return view('task.team.index');
    }

    public function getTeams($request)
    {
        if ($request->ajax()) {
            $teams = Team::select('id', 'team_name', 'created_at')->orderBy('id', 'desc')->get();
            return DataTables::of($teams)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-primary edit-team" data-id="' . $row->id . '">Edit</button>
                        <button class="btn btn-sm btn-danger delete-team" data-id="' . $row->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function allTeams(){
        $teams = Team::all();
        return response()->json([
            'teams' => $teams
        ]);
    }

    public function store($request)
    {
        $team = Team::create([
            'team_name' => $request->team_name,
        ]);
        return response()->json([
            'msg' => 'Team created successfully',
            'data' => $team
        ]);
    }

    public function edit($id){
        $team = Team::findOrFail($id);
        return response()->json([
            'team' => $team
        ]);
    }

    public function update($request, $id){
        $team = Team::findOrFail($id);
        $team->update([
            'team_name' => $request->team_name,
        ]);
        return response()->json([
            'msg' => 'Team updated successfully',
            'data' => $team
        ]);
    }

    public function delete($id){
        $team = Team::findOrFail($id);
        $team->delete();
        return response()->json([
            'msg' => 'Team deleted successfully'
        ]);
    }
}
