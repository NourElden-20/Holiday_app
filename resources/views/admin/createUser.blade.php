@extends('layouts.admin')

@section('main-content')
<div class="d-flex justify-content-center " style="min-height: 100vh;">
    <div class=" shadow-lg p-3 mb-5 bg-white rounded m-2 mt-5">
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

        <h3 class="text-center mb-4">Create New User</h3>

        <form method="POST" action="{{ route('newUser') }}" class="row g-3">
            @csrf

            <div class="form-group col-md-6">
                <label for="name" class="form-label fw-bold">First name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="name" class="form-label fw-bold">last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="employee_type" class="form-label fw-bold">User Type</label>
                <select name="employee_type" id="employee_type" class="form-select" aria-label="Default select example">
                    <option value="employee" selected>Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="text-center form-group col-md-6 ">
                <button type="submit" class="btn btn-primary px-4">Create User</button>
            </div>
        </form>

    </div>
</div>
@endsection
