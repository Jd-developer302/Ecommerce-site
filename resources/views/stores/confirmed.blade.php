@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        @include('layouts.partials.messages')
        <h1 class="page-title">Conformed Orders(@php
            echo count($Orders);
        @endphp)</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('imile.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control-file"
                                accept=".xlsx,.xls" required>
                        </div>
                        <div class="form-group">
                            <label for="Delivery">Delivery Partner</label>
                            <select name="delivery_partner" id="delivery_partner" class="form-control">
                                <option value="1">J&T</option>
                                <option value="2">iMile</option>
                                <option value="3">Panda</option>
                                <option value="4">Impress</option>
                                <option value="5">Camel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Import </button>
                    </form>

                    <a id="something" class="btn btn-sm btn-info m-1" style="float: right;color:#fff"><i
                            class="fa fa-refresh"></i>Refresh</a>
                    <form action="{{ route('orders.export') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="idsEE" value="">
                        <button class="btn btn-sm btn-secondary m-1" href=""><i class="fa fa-excel"></i>
                            Export</button>
                    </form>

                    <form action="{{ route('bulk.invoice') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="ids" value="">
                        <button class="btn btn-sm btn-secondary m-1" href=""><i class="fa fa-print"></i>
                            Invoice</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="tableClass table table-bordered">
                    <thead>
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass"><input type="checkbox" id="master"> Order No</th>
                            <th class="thClass">Name</th>
                            <th class="thClass">Phone</th>
                            <th class="thClass">Amount</th>
                            <th class="thClass">Created At</th>
                            <th class="thClass">Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Orders as $order)
                            <tr>
                                <td class="tdClass" scope="row"><input type="checkbox" class="sub_chk"
                                        data-id="{{ $order->order_id }}">&nbsp;
                                    <a href="{{ route('orders.show', $order->id) }}">{{ $order->order_id }}</a>
                                </td>
                                <td class="tdClass">{{ $order->name }}</td>
                                <td class="tdClass">{{ $order->phone }}</td>
                                <td class="tdClass">
                                    <div style="text-align: right;">{{ $order->total_price }} AED</div>
                                </td>
                                <td class="tdClass">{{ $order->created_at }}</td>
                                <td class="tdClass">{{ $order->created_by }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {!! $Orders->links('pagination::bootstrap-4') !!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                $(".ids").val(allVals);
            });
            $('.sub_chk').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                $(".ids").val(allVals);
            });
            $('#something').click(function() {
                location.reload();
            });

        });
        $('.generate_invoice').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to generate invoice?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });
    </script>
@endsection
