@extends('layouts.master')

@section('content')
<script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Role Management</h1>
    <div>
        <ol class="breadcrumb">
            @can('role-create')
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary my-1">Add Role</a>
            @endcan
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="card ml-2 mt-5 mb-5 mb-lg-10">
    <div class="card-body">
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr style="background-color: #E4A11B;">
                        <th class="thClass">No</th>
                        <th class="thClass">Name</th>
                        <th class="thClass">Action</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td class="tdClass">{{ ++$i }}</td>
                        <td class="tdClass">{{ $role->name }}</td>
                        <td class="tdClass">
                            <a class="btn btn-warning btn-sm" href="{{ route('roles.show', $role->id) }}"><i
                                    class="fa fa-eye"></i></a>
                            @can('role-edit')
                            <a class="btn btn-info btn-sm" href="{{ route('roles.edit', $role->id) }}"><i
                                    class="fa fa-edit"></i></a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                            {!! Form::button('<i class="fa fa-trash-alt"></i>', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            ]) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--end::Tbody-->
            </table>
            <div class="d-flex">
                {!! $roles->links('pagination::bootstrap-4') !!}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
@endsection