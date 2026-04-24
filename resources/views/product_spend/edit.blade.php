@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="page-header">
        <h1 class="page-title">Edit Product Spend </h1>
        <div>
            {{-- <ol class="breadcrumb">
             <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-primary my-1">Add Coupon</a>
        </ol> --}}
        </div>
    </div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10 ">
        <div class="card-body">

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('product.spands.update', $productSpand->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="total_spand" class="form-label">Spend</label>
                    <input type="number" class="form-control" id="total_spand" name="total_spand"
                        value="{{ $productSpand->total_spand }}" required>
                </div>
                <div class="mb-3">
                    <label for="date_spend" class="form-label">Date Spend (Optional)</label>
                    <input type="date" name="date_spend" id="date_spend" class="form-control"  value="{{ $productSpand->date_spend }}" required>
                    @error('date_spend')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">Reason  (Optional)</label>
                    <input type="text" class="form-control" id="reason" name="reason"
                        value="{{ $productSpand->reason }}" >
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('product.spands.index', ['product_id' => $productSpand->product_id]) }}"
                    class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
@endsection
