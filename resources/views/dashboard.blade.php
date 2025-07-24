<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 16px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .task-card {
            border-left: 4px solid #0d6efd;
        }

        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Task Manager</a>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link" href="#"><i class="fa fa-bell"></i> Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user-circle"></i> Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main layout -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <h5 class="mb-4">Menu</h5>
            <a href="#">Dashboard</a>
            <a href="#">My Tasks</a>
            <a href="#">Teams</a>
            <a href="#">Notifications</a>
            <a href="#">Settings</a>
        </div>

        <!-- Content -->
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>My Tasks</h3>
                <button class="btn btn-primary">
                    <i class="fa fa-plus"></i> New Task
                </button>
            </div>

            <div class="row">
                <!-- Task Card -->
                <div class="col-md-6">
                    <div class="card task-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Design Dashboard</h5>
                            <p class="card-text">Create the dashboard UI for analytics.</p>
                            <p class="text-muted small mb-2">
                                Assigned to: John Doe <br>
                                Deadline: 2025-07-25
                            </p>
                            <span class="badge bg-info">In Progress</span>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-success">Mark Complete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repeat Task Cards -->
                <div class="col-md-6">
                    <div class="card task-card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">API Integration</h5>
                            <p class="card-text">Integrate the payment gateway API with backend.</p>
                            <p class="text-muted small mb-2">
                                Assigned to: Jane Smith <br>
                                Deadline: 2025-07-20
                            </p>
                            <span class="badge bg-warning text-dark">Pending</span>
                            <div class="mt-3">
                                <button class="btn btn-sm btn-outline-primary">View</button>
                                <button class="btn btn-sm btn-outline-success">Mark Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Repeat -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
