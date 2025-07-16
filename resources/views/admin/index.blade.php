@extends("layouts.admin")
@section("main-content")

<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-4 shadow rounded-lg">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($requests as $req)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $req->user->name ?? 'Unknown' }}</td>
                        <td>{{ $req->start_date }}</td>
                        <td>{{ $req->end_date }}</td>
                        <td>{{ $req->reason }}</td>
                        <td>
                            <span class="badge 
                                        @if($req->status == 'approved') bg-success
                                        @elseif($req->status == 'rejected') bg-danger
                                        @else bg-warning text-dark @endif">
                                {{ ucfirst($req->status) }}
                            </span>
                        </td>
                        <td>{{ $req->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if($req->status_request == 'pending')
                            <form action="{{ route('approve', $req->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">✔ Accept</button>
                            </form>
                            <form action="{{ route('reject', $req->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">✘ Reject</button>
                            </form>
                            @else
                            <span class="text-muted">No Actions</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No leave requests found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection