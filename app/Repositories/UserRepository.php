<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserRepository implements UserInterface
{
    public function index()
    {
        return view('task.user.index');
    }

    public function store($request)
    {
        $password = Str::random(8);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'team_id' => $request->team_id,
            'password' => bcrypt($password)
        ]);

        SendWelcomeEmailJob::dispatch($user, $password);

        return response()->json([
            'msg' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    public function getUsers()
    {
        $users = User::select('users.*', 'teams.team_name as team_name', 'roles.role_name as role_name')
            ->leftJoin('teams', 'teams.id', '=', 'users.team_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->orderBy('users.id', 'desc')
            ->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-sm btn-primary edit-user" data-id="' . $row->id . '">Edit</button>
                <button class="btn btn-sm btn-danger delete-user" data-id="' . $row->id . '">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'user' => $user
        ]);
    }

    public function update($request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'team_id' => $request->team_id,
        ]);
        return response()->json([
            'msg' => 'User updated successfully',
            'data' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'msg' => 'User deleted successfully'
        ]);
    }
}
