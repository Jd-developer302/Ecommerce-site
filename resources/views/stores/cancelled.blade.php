@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
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
    @php
        function getClass($value)
        {
            return match ($value) {
                'DELIVERED' => 'delivered',
                'NO ANSWER' => 'no_answer',
                'CANCELLED' => 'cancelled',
                'PICKEDUP' => 'pickedup',
                default => '',
            };
        }
    @endphp
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Orders</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-header row">
            <div class="col-md-12">
                <div id="qr-reader" style="width: 100% !important"></div>
            </div>
            <div class="col-md-12">
                <div class="card-toolbar mt-3">
                    <form action="{{ route('stores.cancelled') }}" method="post" id="myForm">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="text" name="order_id" id="picked_order_id" value="" class="form-control"
                            autofocus="autofocus" placeholder="Scan for cancel ...." required>
                        <input type="hidden" name="status" value="CANCELLED" class="form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('picked_order_id').focus();
        });

        window.onload = function() {
            document.getElementById('picked_order_id').focus();
        };

        function onScanSuccess(decodedText) {
            $("#picked_order_id").val(decodedText);
            getOrderStatus(decodedText);
        }

        function getOrderStatus(orderId) {
            if (!orderId) {
                alert("Invalid order ID.");
                return;
            }

            $.ajax({
                url: '/get-order-status',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    order_id: orderId,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.details.status === 'PACKED') {
                            document.getElementById("myForm").submit();
                        } else {
                            alert(`Order status is '${response.details.status}'. Cannot cancel.`);
                        }
                    } else {
                        alert(response.message || "Error fetching order status.");
                    }
                },
                error: function() {
                    alert("An error occurred while fetching the order status.");
                }
            });
        }

        $(document).ready(function() {
            const html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", {
                fps: 10,
                qrbox: 250
            });
            html5QrcodeScanner.render(onScanSuccess);

            // Additional checkbox handlers
            $('#master').on('click', function() {
                $(".sub_chk").prop('checked', $(this).is(':checked'));
                updateSelectedOrders();
            });

            $('.sub_chk').on('click', updateSelectedOrders);

            function updateSelectedOrders() {
                const selectedIds = $(".sub_chk:checked").map(function() {
                    return $(this).attr('data-id');
                }).get();
                $("#ids").val(selectedIds.join(","));
            }

            $('.generate_invoice').on('click', function() {
                const selectedIds = $(".sub_chk:checked").map(function() {
                    return $(this).attr('data-id');
                }).get();

                if (!selectedIds.length) {
                    alert("Please select at least one row.");
                    return;
                }

                if (confirm("Are you sure you want to generate an invoice?")) {
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': CSRF_TOKEN
                        },
                        data: {
                            ids: selectedIds.join(",")
                        },
                        success: function(data) {
                            if (data.success) {
                                alert(data.success);
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                            } else {
                                alert(data.error || "An error occurred.");
                            }
                        },
                        error: function() {
                            alert("An error occurred while generating the invoice.");
                        }
                    });
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection
