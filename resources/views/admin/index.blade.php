@extends('layouts.admin')
@section('header')
@section('main-content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-4 shadow rounded-lg">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th></th>
                        <th>Employee_id</th>
                        <th>Employee</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($requests as $req)
                    <tr>
                        <td><a href="{{route('showRequestDetails',['id' => $req->id])}}">{{ $loop->iteration }}</a></td>
                        <td>{{ $req->user->id }}</td>
                        <td>{{ $req->user->first_name ?? 'Unknown' }}</td>
                        <td>{{ $req->start_date }}</td>
                        <td>{{ $req->end_date }}</td>
                        <td>{{ $req->reason }}</td>
                        <td>
                            <span class="badge 
                                        @if($req->status_request == 'approved') bg-success
                                        @elseif($req->status_request == 'rejected') bg-danger
                                        @else bg-warning text-dark @endif">
                                {{ ucfirst($req->status_request) }}
                                
                            </span>
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