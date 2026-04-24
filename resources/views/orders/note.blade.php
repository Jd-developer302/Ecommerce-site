@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Add Delivery Note</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="post" action="{{ route('orders.noted', $order->id) }}" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="note_image" placeholder="Image">
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea value="{{ $order->note }}" type="text" class="form-control" name="note" placeholder="Delivery note"
                        required>{{ $order->note }}</textarea>
                    @if ($errors->has('note'))
                        <span class="text-danger text-left">{{ $errors->first('note') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Add Note</button>
            </form>
        </div>

    </div>
@endsection
