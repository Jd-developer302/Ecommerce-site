@extends('layouts.master')

@section('content')
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">User Details</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <img src="/image/{{ $user->image }}" width="150px">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Id :</strong>
                        {{ $user->emirates_no }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Aadhar No:</strong>
                        {{ $user->aadhar_no }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Account No:</strong>
                        {{ $user->account_no }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <span class="badge rounded-pill ">{{ $v }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Visa Status:</strong>
                        {{ $user->visa_status }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Visa Expiry:</strong>
                        {{ $user->visa_expiry }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Base Salary:</strong>
                        {{ $user->base_salary }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Aadhar:</strong>
                        @if ($user->aadhar != '')
                            <span class="badge rounded-pill ">

                                <a href="/files/{{ $user->document }}">view <i class="fa fa-eye"></i></a>

                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>passport:</strong>
                        @if ($user->passport != '')
                            <span class="badge rounded-pill ">
                                <a href="/files/{{ $user->passport }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Id:</strong>
                        @if ($user->emirates_id != '')
                            <span class="badge rounded-pill ">
                                <a href="/files/{{ $user->emirates_id }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Pancard:</strong>
                        @if ($user->pancard != '')
                            <span class="badge rounded-pill ">
                                <a href="/files/{{ $user->pancard }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Cv:</strong>
                        @if ($user->cv != '')
                            <span class="badge rounded-pill ">
                                <a href="/files/{{ $user->cv }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Appointment Letter:</strong>
                        @if ($user->appointment != '')
                            <span class="badge rounded-pill ">
                                    <a href="/files/{{ $user->appointment }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-5">
                    <div class="form-group">
                        <strong>Mutal Agreement:</strong>
                        @if ($user->mutal != '')
                            <span class="badge rounded-pill ">
                                    <a href="/files/{{ $user->mutal }}">view <i class="fa fa-eye"></i></a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
