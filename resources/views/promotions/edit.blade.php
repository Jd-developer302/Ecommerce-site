@extends('layouts.app-master')

@section('content')
    <div class="card mt-3 p-4 rounded">
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h1>Update Promotion</h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form method="post" action="{{ route('promotions.update', $category->id) }}" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label for="featured" class="form-label">Featured</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="featured"
                            @if (old('featured', $category->featured)) checked @endif>

                    </label>
                </div>
                <div class="mb-3">
                    <label for="listing" class="form-label">Listing</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="listing"
                            @if (old('listing', $category->listing)) checked @endif>

                    </label>
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


                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('promotions.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection
