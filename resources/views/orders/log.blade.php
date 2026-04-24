@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Order Log</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <h5>Order Id: #{{ $Status[0]->order_id }}</h5>
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">Status</th>
                            <th class="thClass">Changed By</th>
                            <th class="thClass">Date Time</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($Status as $order)
                            <tr>
                                <td class="tdClass">{{ $order->status }}</th>
                                <td class="tdClass">{{ $order->changed_by }}</td>
                                <td class="tdClass">{{ $order->created_at }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Tbody-->
                </table>
                {{-- <div class="d-flex">
                    {!! $Status->links('pagination::bootstrap-4') !!}
                </div> --}}
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
    </div>
@endsection
