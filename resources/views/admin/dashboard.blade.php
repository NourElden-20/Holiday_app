@extends('layouts.admin')

@section('main-content')
<div class="container mt-4">
    <h2>🛠️ Admin Dashboard</h2>

    <!-- Stats Cards -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <h2>{{ $totalEmployees ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Approved Requests</h5>
                    <h2>{{ $approvedCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-dark bg-warning mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <h2>{{ $pendingCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Rejected Requests</h5>
                    <h2>{{ $rejectedCount ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Recent Requests -->
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            Recent Leave Requests
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Reason</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentRequests as $req)
                    <tr>
                        <td>{{ $req->user->first_name }}</td>
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
                        <td class="w-25 m-5">
                            @if($req->status_request == 'pending')
                            <div class="d-flex gap-2 ">
                                <form action="{{ route('approve', $req->id) }}" method="POST" class="flex-fill">
                                    @csrf
                                    <button class="btn btn-sm btn-success w-100">Approve</button>
                                </form>
                                <form action="{{ route('reject', $req->id) }}" method="POST" class="flex-fill">
                                    @csrf
                                    <button class="btn btn-sm btn-danger w-100">Reject</button>
                                </form>
                            </div>
                            @else
                            <em class="text-muted">No Action</em>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No recent requests</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection