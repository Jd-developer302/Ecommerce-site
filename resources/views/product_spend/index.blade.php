@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="page-header">
        <h1 class="page-title">Spends for Product:- {{ $product->name }} </h1>
        <div>
            {{-- <ol class="breadcrumb">
                 <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-primary my-1">Add Coupon</a>
            </ol> --}}
        </div>
    </div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <!--begin::Card body-->
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9 border-bottom">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-Color:#E4A11B;">
                            <th class="thClass">No</th>
                            <th class="thClass">Spends</th>
                            <th class="thClass">Date</th>
                            <th class="thClass">Reason</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($productSpands as $spand)
                            <tr>
                                <th scope="row" class="tdClass">{{ $spand->id }}</th>
                                <td class="tdClass">{{ $spand->total_spand }} AED
                                </td>
                                <td class="tdClass">{{ $spand->date_spend }}
                                <td class="tdClass">{{ $spand->reason }}</td>
                                <td class="tdClass d-flex">
                                    <a href="{{ route('product.spands.edit', $spand->id) }}" class="btn btn-warning btn-sm mx-1"><i
                                        class="fa fa-edit"></i></a>
                                    <form action="{{ route('product.spands.destroy', $spand->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1"><i class="fa fa-trash-alt"></i></button>
                                    </form>
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
    {{-- 
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
    </script> --}}
@endsection
