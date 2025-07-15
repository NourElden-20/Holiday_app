@extends('layouts.admin')

@section('content')

<!-- Page Heading -->


<!-- Form Card -->
<span><h1>LEAVE REQUEST FORM</h1></span>
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
@extends('layouts.admin')

@endsection