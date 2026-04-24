@extends('layouts.master')
@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title"> Show Roles</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body pb-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
