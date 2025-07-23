@extends('layouts.admin')

@section('main-content')

<div class="container shadow-lg p-3 mb-5 bg-white rounded m-5">
    <span>
        <h1>{{ $request ? 'EDIT LEAVE REQUEST' : 'LEAVE REQUEST FORM' }}</h1>
    </span>

    <form action="{{ $request ? route('update', $request->id) : route('store') }}" method="POST" class="row g-3">
        @csrf
        @if($request)
            @method('PUT')
        @endif

        <div class="form-group col-md-6">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required
                   value="{{ old('start_date', $request->start_date ?? '') }}">
        </div>

        <div class="form-group col-md-6">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" required
                   value="{{ old('end_date', $request->end_date ?? '') }}">
        </div>

        <div class="form-group col-12">
            <label for="reason">Reason</label>
            <textarea name="reason" class="form-control" rows="4" required>{{ old('reason', $request->reason ?? '') }}</textarea>
        </div>

        <button class="w-10 btn btn-{{ $request ? 'warning' : 'primary' }}" type="submit">
            {{ $request ? 'Update Request' : 'Submit Request' }}
        </button>
    </form>
</div>

@endsection
