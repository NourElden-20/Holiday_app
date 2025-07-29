@extends('layouts.admin')

@section('main-content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="shadow-lg p-4 mb-5 bg-white rounded" style="width: 600px;">
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

        <h3 class="text-center mb-4">Create New User</h3>

        <form method="POST" action="{{ route('newUser') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="employee_type" class="form-label fw-bold">User Type</label>
                <select name="employee_type" id="employee_type" class="form-select">
                    <option value="employee" selected>Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Create User</button>
            </div>
        </form>

    </div>
</div>
@endsection
