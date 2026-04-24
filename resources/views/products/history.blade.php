@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Product History</h1>
    </div>
    <p>Title: {{ $product->title }}</p>
    <!-- Add more details as needed -->

    <h2>Activity Log</h2>
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #E4A11B;">
                <th>Activity</th>
                <th>Date</th>
                <th>Performed By</th>
            </tr>
        </thead>
        <tbody>
            @if (!is_null($activities))
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->created_at }}</td>
                        <td>{{ $activity->causer->name }}</td> <!-- Assuming 'causer' has a 'name' attribute -->
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
