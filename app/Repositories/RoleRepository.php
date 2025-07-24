<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\Role;
use Yajra\DataTables\DataTables;

class RoleRepository implements RoleInterface
{
    public function index()
    {

        return view('task.role.index');
    }

    public function getRoles($request)
    {
        if ($request->ajax()) {
            $roles = Role::select('id', 'role_name', 'created_at')->orderBy('id', 'desc')->get();
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($role) {
                    return '<button class="btn btn-sm btn-primary edit-role" data-id="' . $role->id . '">Edit</button>
                        <button class="btn btn-sm btn-danger delete-role" data-id="' . $role->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store($request)
    {
        $role = Role::create([
            'role_name' => $request->role_name
        ]);
        return response()->json([
            'msg' => 'Role created successfully',
            'data' => $role
        ]);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return response()->json([
            'role' => $role
        ]);
    }

    public function update($request, $id)
    {
        $role = Role::find($id);
        $role->update([
            'role_name' => $request->role_name
        ]);
        return response()->json([
            'msg' => 'Role updated successfully',
            'data' => $role
        ]);
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json([
            'msg' => 'Role deleted successfully'
        ]);
    }
}
