<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Task Manager</a>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link" href="#"><i class="fa fa-bell"></i> Notifications</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="#"><i class="fa fa-user-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-danger btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="/logout" class="modal-content">
            <!-- Include CSRF token if you're using Laravel -->
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Yes, Logout</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
