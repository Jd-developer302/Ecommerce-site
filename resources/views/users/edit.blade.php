@extends('layouts.master')
@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Edit User</h1>
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
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
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
                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
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
                    <strong>Role:</strong>

                    <select name="roles[]" id="" class="form-select">
                        @foreach ($roles as $key => $value)
                            <option value="{{ $key }}" {{ in_array($key, $userRole) ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group ">
                        <strong>Image:</strong>
                       <div class="mt-2"> {!! Form::file('image', null, ['placeholder' => 'Image', 'class' => 'form-control']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Aadhar:</strong>
                       <div class="mt-2"> {!! Form::file('aadhar', null, ['placeholder' => 'Id/Aadhar', 'class' => 'form-control']) !!}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Passposrt:</strong>
                       <div class="mt-2">
                        {!! Form::file('passport', null, ['class' => 'form-control']) !!}
                       </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Id:</strong>
                       <div class="mt-2">
                        {!! Form::file('emirates_id', null, ['class' => 'form-control']) !!}
                       </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Pan Card:</strong>
                        <div class="mt-2">
                            {!! Form::file('pancard', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>CV:</strong>
                        <div class="mt-2">
                            {!! Form::file('cv', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Appointment Letter:</strong>
                        <div class="mt-2">
                            {!! Form::file('appointment', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mutal Agreement:</strong>
                        <div class="mt-2">
                            {!! Form::file('mutal', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Visa Status:</strong>
                        {!! Form::text('visa_status', null, ['placeholder' => 'Visa Status', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Visa Expiry:</strong>
                        {!! Form::date('visa_expiry', null, ['placeholder' => 'Visa Expiry', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Base Salary:</strong>
                        {!! Form::text('base_salary', null, ['placeholder' => 'Base Salary', 'class' => 'form-control']) !!}
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
