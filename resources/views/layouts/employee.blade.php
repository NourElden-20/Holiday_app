<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white"
         style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0;">
        <h4 class="mb-4">👨‍💼 Employee</h4>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="{{ route('employeeDashboard') }}" class="nav-link text-white {{ request()->routeIs('employee.dashboard') ? 'active bg-primary' : '' }}">
                    <i class="fa fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('create') }}" class="nav-link text-white {{ request()->routeIs('leave.apply') ? 'active bg-primary' : '' }}">
                    <i class="fa fa-file-pen me-2"></i> Apply Leave
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('myRequests') }}" class="nav-link text-white {{ request()->routeIs('leave.requests') ? 'active bg-primary' : '' }}">
                    <i class="fa fa-list me-2"></i> My Requests
                </a>
            </li>
           
            <li class="nav-item mb-2">
                <a href="{{ route('profile.edit') }}" class="nav-link text-white {{ request()->routeIs('profile.edit') ? 'active bg-primary' : '' }}">
                    <i class="fa fa-user me-2"></i> Profile
                </a>
            </li>
            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent">
                        <i class="fa fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1" style="margin-left: 250px;">
        <!-- Top Navbar -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4">
            <div class="container-fluid d-flex justify-content-between">
                <h4 class="mb-0">Employee Dashboard</h4>
                <!-- Profile Dropdown -->
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                       id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/40" alt="profile" class="rounded-circle" width="40" height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
