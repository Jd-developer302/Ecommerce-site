@extends('layouts.master')

@section('content')
<script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Attributes</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('attributes.create') }}" class="btn btn-sm btn-primary my-1">Add Attribute</a>
        </ol>
    </div>
</div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <div class="table-responsive">
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">No</th>
                            <th class="thClass">Name</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($Attributes as $key => $item)
                            <tr>
                                <th scope="row" class="tdClass">{{ $key + 1 }}</th>
                               <td class="tdClass">{{ $item->name }}</td>

                               <td class="tdClass">
                                    @can('product-edit')
                                        <a href="{{ route('attributes.show', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-eye"></i></a>
                                    @endcan
                                    @can('product-edit')
                                        <a href="{{ route('attributes.edit', $item->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('product-edit')
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['attributes.destroy', $item->id],
                                            'id' => 'delete-form-' . $item->id,
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'onclick' => "confirmDelete(event, 'delete-form-{$item->id}')",
                                        ]) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $Attributes->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
