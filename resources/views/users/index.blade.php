@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">User Management</h1>
        <div>
            <ol class="breadcrumb">
                @can('role-create')
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary my-1">Add User</a>
                @endcan
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            @if ($message = Session::get('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: "{{ $message }}",
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    });
                </script>
            @endif

            <table class="table table-bordered">
                <tr style="background-color: #E4A11B;">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td class="tdClass">{{ $key + 1 }}</td>
                        <td class="tdClass">{{ $user->name }}</td>
                        <td class="tdClass">{{ $user->email }}</td>
                        <td class="tdClass">
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <span style="font-weight: 700;">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td class="tdClass">
                            <a class="btn btn-warning btn-sm" href="{{ route('users.show', $user->id) }}"><i
                                    class="fa fa-eye"></i></a>
                            <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('PATCH')
                                @if ($user->is_active)
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i> Active
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-ban"></i> Inactive
                                    </button>
                                @endif
                            </form>
                            @can('user-edit')
                                <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}"><i
                                        class="fa fa-edit"></i></a>
                            @endcan
                            @can('user-delete')
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['users.destroy', $user->id],
                                    'id' => 'delete-form-' . $user->id,
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', [
                                    'type' => 'button',
                                    'class' => 'btn btn-danger btn-sm',
                                    'onclick' => "confirmDelete(event, 'delete-form-{$user->id}')",
                                ]) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {!! $data->links('pagination::bootstrap-4') !!}
    </div>

    <script>
        function confirmDelete(event, formId) {
            event.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection
