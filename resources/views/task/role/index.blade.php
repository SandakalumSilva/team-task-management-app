@extends('task.layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Roles</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">
            <i class="fa fa-plus"></i> Add Role
        </button>
    </div>

    <!-- Role Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="role_table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Role Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('role.store') }}" class="modal-content" id="add_role_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="role_id" id="edit_role_id" />
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Role Name</label>
                        <input type="text" class="form-control" name="role_name" id="roleName"
                            placeholder="e.g., Manager" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/task/role.js'])
@endsection
