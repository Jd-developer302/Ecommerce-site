@extends('layouts.master')
@section('content')
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Add New Category</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">Back</a>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="card mt-3 p-4">
    <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order:</strong>
                    {!! Form::number('order', null, ['placeholder' => 'Order', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="featured" class="form-label">Featured</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="featured">

                    </label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="listing" class="form-label">Listing</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="listing">

                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="image" class="form-label">Image</label>
                <input value="{{ old('image') }}" type="file" class="form-control" name="image"
                    placeholder="Class" required>
                @if ($errors->has('image'))
                <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="banner" class="form-label">Banner</label>
                <input value="{{ old('banner') }}" type="file" class="form-control" name="banner"
                    placeholder="Class" required>
                @if ($errors->has('banner'))
                <span class="text-danger text-left">{{ $errors->first('banner') }}</span>
                @endif
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="ad_banner" class="form-label">Ad Banner</label>
                <input value="{{ old('ad_banner') }}" type="file" class="form-control" name="ad_banner"
                    placeholder="Class" required>
                @if ($errors->has('ad_banner'))
                <span class="text-danger text-left">{{ $errors->first('ad_banner') }}</span>
                @endif
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection