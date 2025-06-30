@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    

    <!-- Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Leave Request Form</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea name="reason" class="form-control" rows="4" required></textarea>
                        </div>

                        <button class="w-10 btn btn-primary" type="submit" class="btn btn-success btn-block">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>@extends('layouts.admin')

@endsection