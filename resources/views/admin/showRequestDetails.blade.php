@extends('layouts.admin')
@section('main-content')

<div class="border p-4 shadow rounded-lg w-100">
    <h2> Request Details</h2>
    <p><strong>ID:</strong> {{ $leaveRequest->id }}</p>
    <p><strong>Employee:</strong>{{ $leaveRequest->user->first_name."".$leaveRequest->user->last_name }} </p>
    <p><strong>Start Date:</strong> {{ $leaveRequest->start_date }} </p>
    <p><strong>End Date:</strong>{{ $leaveRequest->end_date }} </p>
    <p><strong>Reason:</strong>{{ $leaveRequest->reason }} </p>
    <p><strong>Status:</strong> {{ ucfirst($leaveRequest->status_request) }}</p>
    @if($leaveRequest->status_request == 'pending')
    <form action="{{ route('approve', $leaveRequest->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">✔ Accept</button>
    </form>
    <form action="{{ route('reject', $leaveRequest->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">✘ Reject</button>
    </form>
    @else
    <span class="text-muted">No Actions</span>
    @endif
</div>

@endsection