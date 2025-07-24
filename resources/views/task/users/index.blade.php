@extends('task.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Users</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fa fa-user-plus"></i> Add User
        </button>
    </div>

    <!-- User List -->
    <table class="table table-hover bg-white rounded shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Team</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample User Row -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Manager</td>
                <td>Team Alpha</td>
                <td>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            <!-- Repeat more rows here -->
        </tbody>
    </table>
@endsection
