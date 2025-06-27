<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Leave Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="container py-5">
                        <h3 class="mb-4">My Leave Requests</h3>
                        <table class="table table-bordered table-hover shadow-sm">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Submitted At</th>
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
</x-app-layout>