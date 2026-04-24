@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Update Coupon</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('coupons.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="post" action="{{ route('coupons.update', $coupon->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input value="{{ $coupon->code }}" type="text" class="form-control" name="code"
                        placeholder="Price" required>

                    @if ($errors->has('code'))
                        <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ $coupon->price }}" type="number" class="form-control" name="price"
                        placeholder="Price" required>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Is Active?</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="is_active"
                            @if ($coupon->is_active == 1) checked @endif>

                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Update coupon</button>
                <a href="{{ route('coupons.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection
