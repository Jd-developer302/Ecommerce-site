@extends('layouts.master')
@section('content')
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Add New Role</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Back</a>
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
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach ($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                        {{ $value->name }}</label>
                    <br />
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection