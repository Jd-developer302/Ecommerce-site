@extends('layouts.master')

@section('content')
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
    <style>
        .delivered {
            background-color: rgb(49, 252, 49);
        }

        .no_answer {
            background-color: rgb(242, 255, 53);
        }

        .cancelled {
            background-color: rgb(255, 110, 110);
        }

        .pickedup {
            background-color: rgb(110, 255, 255);
        }
    </style>
    {{-- @php
        function getClass($value)
        {
            if ($value == 'DELIVERED') {
                return 'delivered';
            } elseif ($value == 'NO ANSWER') {
                return 'no_answer';
            } elseif ($value == 'CANCELLED') {
                return 'cancelled';
            } elseif ($value == 'PICKEDUP') {
                return 'pickedup';
            } elseif ($value == 'ORDER PLACED') {
                return 'order_placed';
            } elseif ($value == 'TO BE CONFORMED') {
                return 'awaiting_conformation';
            } elseif ($value == 'ORDER CONFIRMED') {
                return 'order_conformed';
            } elseif ($value == 'PACKED') {
                return 'packed';
            } elseif ($value == 'RESHEDULED') {
                return 'resheduled';
            } elseif ($value == 'COMPLETED') {
                return 'completed';
            } elseif ($value == 'INVOICE PRINTED') {
                return 'invoice_printed';
            } elseif ($value == 'ASSIGNED TO RIDER') {
                return 'assigned_to_rider';
            }
        }
    @endphp --}}
     <div class="page-header">
        <h1 class="page-title">Rma Orders</h1>
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
                <table class="table table-flush align-middle table-bordered text-nowrap border-bottom table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-Color:#E4A11B;">
                            <th class="thClass">Sl. No</th>
                            <th class="thClass"> Order No</th>
                            <th class="thClass">Status</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        <?php $count = ($Rmas->currentPage() - 1) * $Rmas->perPage() + 1; ?>
                        @foreach ($Rmas as $key => $rma)
                            <tr>
                                <td class="tdClass">{{ $count++ }}</td>
                                <td class="tdClass">
                                    #{{ $rma->order_id }}</td>
                                <td class="tdClass">
                                    <button class="btn btn-sm">{{ $rma->status }}</button>
                                </td>

                                <td class="tdClass"><a href="{{ route('rma.view.orders', $rma->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Tbody-->
                </table>
                <div class="d-flex">
                    {!! $Rmas->links('pagination::bootstrap-4') !!}
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f97e95c6885f3c9641b2', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('status-channel');
        channel.bind('status-event', function(data) {
            toastr.warning('Order  No: ' + JSON.stringify(data).order_id +
                ' status is changed to cancelled/no answer, please check!!');
            setTimeout(function() {
                location.reload();
            }, 4000);
        });
    </script>
@endsection
