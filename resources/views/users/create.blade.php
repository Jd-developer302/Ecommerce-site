@extends('layouts.master')

@section('content')


<style>
    .file-upload-wrapper {
    margin-top: 1rem; /* Adjust as needed */
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px dashed #ccc;
    border-radius: 8px;
    padding: 10px;
    background-color: #f9f9f9;
    transition: background-color 0.3s, border-color 0.3s;
}

.file-upload-wrapper:hover {
    background-color: #f3f3f3;
    border-color: #999;
}

.file-input {
    opacity: 0; /* Hide the default file input */
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
    z-index: 2;
}

.file-upload-wrapper::after {
    content: 'Upload Image';
    font-size: 16px;
    color: #666;
    z-index: 1;
    position: relative;
    text-align: center;
    pointer-events: none;
}

</style>
<script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Create User</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
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
            {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Id:</strong>
                        {!! Form::text('emirates_no', null, ['placeholder' => 'Id', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Aadhar No:</strong>
                        {!! Form::text('aadhar_no', null, ['placeholder' => 'Aadhar', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Bank Account No:</strong>
                        {!! Form::text('account_no', null, ['placeholder' => 'Bank Account Number', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', ]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                       <div class="mt-2 file-upload-wrapper">
                        {!! Form::file('image', null, ['placeholder' => 'Image', 'class' => 'form-control file-input']) !!}
                       </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Aadhar:</strong>
                       <div class="mt-2 file-upload-wrapper"> {!! Form::file('aadhar', null, ['placeholder' => 'Id/Aadhar', 'class' => 'orm-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Passposrt:</strong>
                       <div class="mt-2 file-upload-wrapper"> {!! Form::file('passport', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Id:</strong>
                        <div class="mt-2 file-upload-wrapper">{!! Form::file('emirates_id', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Pan Card:</strong>
                       <div class="mt-2 file-upload-wrapper"> {!! Form::file('pancard', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>CV:</strong>
                      <div class="mt-2 file-upload-wrapper">  {!! Form::file('cv', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Appointment Letter:</strong>
                        <div class="mt-2 file-upload-wrapper">{!! Form::file('appointment', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mutal Agreement:</strong>
                       <div class="mt-2 file-upload-wrapper"> {!! Form::file('mutal', null, ['class' => 'form-control file-input']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Visa Status:</strong>
                        <div class="mt-2">{!! Form::text('visa_status', null, ['placeholder' => 'Visa Status', 'class' => 'form-control']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Visa Expiry:</strong>
                        <div class="mt-2">{!! Form::date('visa_expiry', null, ['placeholder' => 'Visa Expiry', 'class' => 'form-control']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Base Salary:</strong>
                        <div class="mt-2">{!! Form::text('base_salary', null, ['placeholder' => 'Base Salary', 'class' => 'form-control']) !!}</div>
                    </div>
                </div>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@endsection
