@extends('layouts.admin')
@section('main-content')
<div class="py-12 m-4">
    <div class="max-w-7xl  sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="py-5 m-3">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Leave Requests</h1>
                        <a href="{{Route("create")}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Create request</a>


                    </div>



                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $req)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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

                                <td>{{ $req->created_at->format('d-m-Y') }}</td>
                                <td>{{ $req->action }}
                                
                                    <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="{{ route('edit',$req->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No requests found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>





            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_content')