@extends('layouts.app-master')
@section('content')
    <div class="card mt-3 p-4 rounded">
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h1>Add New Category</h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
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
            {!! Form::open(['route' => 'promotions.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="featured" class="form-label">Featured</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="featured">

                    </label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="listing" class="form-label">Listing</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="listing">

                    </label>
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
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Category</button>
            <a href="{{ route('promotions.index') }}" class="btn btn-default">Back</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
