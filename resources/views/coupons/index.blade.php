@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Coupons</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-primary my-1">Add Coupon</a>
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
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">No</th>
                            <th class="thClass">Code</th>
                            <th class="thClass">Price</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($coupons as $item)
                            <tr>
                                <th scope="row" class="tdClass">{{ $item->id }}</th>
                                <td class="tdClass">{{ $item->code }}
                                </td>
                                <td class="tdClass">{{ $item->price }}</td>
                                <td class="tdClass">
                                    {{-- <a class="btn btn-warning btn-sm" href="{{ route('coupons.show', $item->id) }}"><i
                                class="fa fa-eye"></i></a> --}}
                                    {{-- <a class="btn btn-info btn-sm" href="{{ route('coupons.edit', $item->id) }}"><i
                                class="fa fa-edit"></i></a> --}}
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['coupons.destroy', $item->id],
                                        'id' => 'delete-form-' . $item->id,
                                        'style' => 'display:inline',
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'onclick' => "confirmDelete(event, 'delete-form-{$item->id}')",
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Tbody-->
                </table>
                {{-- <div class="d-flex">
                    {!! $items->links('pagination::bootstrap-4') !!}
                </div> --}}
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
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
