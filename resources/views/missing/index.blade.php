@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Missing Orders</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="tableClass table table-bordered">
                    <thead>
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">Sl. No.</th>
                            <th class="thClass">Name</th>
                            <th class="thClass">Phone</th>
                            <th class="thClass">Email</th>
                            <th class="thClass">Product</th>
                            <th class="thClass">WhatsApp</th>
                            <th class="thClass">City</th>
                            <th class="thClass">Quantity</th>
                            <th class="thClass">Created At</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = ($orders->currentPage() - 1) * $orders->perPage() + 1; ?>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td class="tdClass">{{ $count++ }}</td>
                                <td class="tdClass">{{ $order->name }}</td>
                                <td class="tdClass">{{ $order->areacode }} {{ $order->phone }}</td>
                                <td class="tdClass">
                                    {{ $order->email }}
                                </td>
                                <td class="tdClass">{{ @$order->product->name }}<br><img
                                        src="{{ asset('image/' . @$order->product->image) }}" alt="image"
                                        style="width:100px">
                                </td>
                                <td class="tdClass">{{ $order->whatsapp }}</td>
                                <td class="tdClass">{{ $order->city }}</td>
                                <td class="tdClass">{{ $order->quantity }}</td>
                                <td class="tdClass">
                                    {{ $order->created_at }}
                                </td>
                                <td class="tdClass">

                                    @if ($order->created_at->diffInMinutes() > 5)
                                        <button class="btn btn-primary" onclick="AddOrder({{ $order->id }})">
                                            <i class="fa fa-plus"></i> Add To Order
                                        </button>
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {!! $orders->links('pagination::bootstrap-4') !!}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function AddOrder(miss_id) {

            axios.post('api/add_to_order', {
                    miss_id
                })
                .then(response => console.log("Data saved successfully:", response.data))
                .catch(error => console.error("There was an error saving the data:", error));

            window.location.reload()
        }
    </script>
@endsection
