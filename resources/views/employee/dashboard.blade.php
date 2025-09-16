{{-- resources/views/employee/dashboard.blade.php --}}
@extends('layouts.employee')

@section('main-content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>👨‍💼 Employee Dashboard</h2>

    <!-- Profile Dropdown -->
    
</div>

    <div class="row">
        <!-- Approved -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Approved Requests</h5>
                    <h2>{{ $approvedCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <!-- Pending -->
        <div class="col-md-4">
            <div class="card text-dark bg-warning mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <h2>{{ $pendingCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <!-- Rejected -->
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Rejected Requests</h5>
                    <h2>{{ $rejectedCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div>
        <div class="card shadow mb-4 ">
            <div class="card-header bg-primary text-white text-center">
                Requests Overview
            </div>
            <div class="card-body">
                <canvas id="requestsChart"></canvas>
            </div>
        </div>
    </div>


    <!-- Recent Requests -->
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            Recent Leave Requests
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Reason</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentRequests as $req)
                    <tr>
                        <td>{{ $req->reason }}</td>
                        <td>{{ $req->start_date }}</td>
                        <td>{{ $req->end_date }}</td>
                        <td>
                            @if($req->status_request == 'approved')
                            <span class="badge bg-success">Approved</span>
                            @elseif($req->status_request == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                            @else
                            <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No recent requests</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('requestsChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Approved', 'Pending', 'Rejected'],
            datasets: [{
                data: [
                    {{ $approvedCount ?? 0 }},
                    {{ $pendingCount ?? 0 }},
                    {{ $rejectedCount ?? 0 }}
                ],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            }]
        }
    });
</script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
F
<!-- Bootstrap JS (includes Popper) -->


@endsection