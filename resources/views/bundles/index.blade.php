@extends('layouts.master')

@section('content')
<script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Bundles</h1>
    <div>
        <ol class="breadcrumb">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Add product</a>
            <a href="{{ route('products.addbundle') }}" class="btn btn-sm btn-dark  mx-1">Add bundle</a>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<div class="card ml-2 mt-5 mb-5 mb-lg-10">
    <div class="row m-3">
        <form method="POST" action="{{ route('bundles.search') }}">
            @csrf
            <div class="row">
                <label for="name" class="form-label">Search Bundles</label>
                <div class="col-12 col-md-5 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                        placeholder="search by name">
                </div>
                <div class="col-12 col-md-5 mb-3">
                    <label for="name" class="form-label">SKU</label>
                    <input value="{{ old('sku') }}" type="text" class="form-control" name="sku"
                        placeholder="search by sku">

                </div>
                <div class="col-12 col-md-2 mb-3 mt-5">
                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr style="background-color: #E4A11B;">
                        <th class="thClass">No</th>
                        <th class="thClass">Name</th>
                        <th class="thClass">SKU</th>
                        <th class="thClass">Image</th>
                        <th class="thClass">Price</th>
                        <th class="thClass">Action</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                    @foreach ($Bundles as $key => $Bundle)
                    <tr>
                        <th scope="row" class="tdClass">{{ $key + 1 }}</th>
                        <td class="tdClass">{{ $Bundle->name }}</td>
                        <td class="tdClass">
                            {{ $Bundle->sku }}
                        </td>
                        <td class="tdClass"><img src="{{ URL::asset('image/' . $Bundle->image) }}" alt="Bundle"
                                width="100px">
                        </td>
                        <td class="tdClass">
                            {{ $Bundle->price }} AED
                        </td>

                        <td class="tdClass"><a href="{{ route('bundles.show', $Bundle->id) }}"
                                class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                            @can('product-edit')
                            <a href="{{ route('bundles.edit', $Bundle->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            @endcan
                            @can('product-delete')
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['bundles.destroy', $Bundle->id],
                            'id' => 'delete-form-' . $Bundle->id,
                            'style' => 'display:inline',
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-alt"></i>', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'onclick' => "confirmDelete(event, 'delete-form-{$Bundle->id}')",
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
                {!! $Bundles->links('pagination::bootstrap-4') !!}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
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