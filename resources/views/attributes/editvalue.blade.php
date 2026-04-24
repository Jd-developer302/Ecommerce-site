@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="POST" action="{{ route('attributevalue.update', $attribute->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="value" class="form-label">Value</label>
                    <input value="{{ $attribute->value }}" type="text" class="form-control" name="value"
                        placeholder="Value" required>

                    @if ($errors->has('value'))
                        <span class="text-danger text-left">{{ $errors->first('value') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Change</button>
                <a href="{{ route('attributes.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
