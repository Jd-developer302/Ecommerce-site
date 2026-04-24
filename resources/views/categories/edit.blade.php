@extends('layouts.master')

@section('content')
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Update Category</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">Back</a>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="card mt-3 p-4">
    <div class="card-body">
        <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ $category->name }}" type="text" class="form-control" name="name"
                    placeholder="Name" required>

                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Order</label>
                <input value="{{ $category->order }}" type="number" class="form-control" name="order"
                    placeholder="Order" required>

                @if ($errors->has('order'))
                <span class="text-danger text-left">{{ $errors->first('order') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="featured" class="form-label">Featured</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="featured"
                            @if (old('featured', $category->featured)) checked @endif>

                    </label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="listing" class="form-label">Listing</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="listing"
                            @if (old('listing', $category->listing)) checked @endif>

                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{ old('image') }}" type="file" class="form-control" name="image"
                    placeholder="Class">
                <img src="/image/{{ $category->image }}" width="100px">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Banner</label>
                <input value="{{ old('banner') }}" type="file" class="form-control" name="banner"
                    placeholder="Class">
                <img src="/banner/{{ $category->banner }}" width="300px">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ad Banner</label>
                <input value="{{ old('ad_banner') }}" type="file" class="form-control" name="ad_banner"
                    placeholder="Class">
                <img src="/ad_banner/{{ $category->ad_banner }}" width="300px">
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
        </form>
    </div>

</div>
@endsection