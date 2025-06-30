@extends('layouts.headerAndFot')
<title>@yield('page_title', 'craete_page')</title>
@section('header_content')
 

    @section('main_content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1>Hello from Create Page</h1>
                    <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow-lg rounded-4">
                                    <div class="card-header bg-primary text-white fs-4">Submit Leave Request</div>
                                    <div class="card-body">
                                        <form action="{{ route('store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" name="start_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="date" class="form-control" name="end_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Reason</label>
                                                <textarea class="form-control" name="reason" rows="4" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success w-100">Submit Request</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
            </div>
        </div>
    </div>
    @endsection
@section('footer_content')