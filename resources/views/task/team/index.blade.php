@extends('task.layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Teams</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamModal">
            <i class="fa fa-plus"></i> Add Team
        </button>
    </div>

    <!-- Team Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="team_table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Team Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Team Modal -->
    <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" id="add_team_form" method="POST" action="{{ route('team.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="team_id" id="edit_team_id">
                    <div class="mb-3">
                        <label for="teamName" class="form-label">Team Name</label>
                        <input type="text" class="form-control" id="teamName" name="team_name"
                            placeholder="e.g., Marketing Team" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Team</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/task/team.js'])
@endsection
