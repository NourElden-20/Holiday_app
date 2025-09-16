@extends('layouts.admin')
@section('main-content')



<div class=" p-4 shadow rounded-lg ">
    <h3>Users List</h3>
    <table class="table table-bordered table-hover align-middle ">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @endforeach
            @if($users->isEmpty())
            <tr>
                <td colspan="8" class="text-center text-muted">No users found.</td>
            </tr>
            @endif


        </tbody>
    </table>
</div>
@endsection