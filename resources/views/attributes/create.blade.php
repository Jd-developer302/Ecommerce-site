@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Add New Attribute</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('attributes.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="POST" action="{{ route('attributes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('attributes.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
