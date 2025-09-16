@extends('layouts.employee')

@section('main-content')

<div class=" shadow-lg p-3 mb-5 bg-white rounded m-2 ">
  <span>
    <h1>{{ $request ? 'EDIT REQUEST' : ' REQUEST ' }}</h1>
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

    <div class="form-group col-md-6">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" required
        value="{{ old('end_date', $request->title ?? '') }}">
    </div>

    <div class="form-group col-12">
      <label for="reason">Reason</label>
      <textarea id="mytextarea" name="reason" class="form-control" rows="4" required>{{ old('reason', $request->reason ?? '') }}</textarea>
    </div>

    <button class="w-10 btn btn-{{ $request ? 'warning' : 'primary' }}" type="submit">
      {{ $request ? 'Update' : 'Save' }}
    </button>
  </form>
</div>


<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    forced_root_block: false,
    statusbar: false,
    force_br_newlines: true,
    remove_linebreaks: false,
    convert_newlines_to_brs: true,
    license_key: 'gpl',
    height: 300,
    menubar: false,
    branding: false,
    plugins: 'lists link image preview',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link image preview',
    setup: function(editor) {
      editor.on('change', function() {
        editor.save();
      });
    }
  });
</script>



@endsection