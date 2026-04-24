@extends('layouts.master')
@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <style>
        .switchC {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switchC input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .sliderC {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .sliderC:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.sliderC {
            background-color: #2196F3;
        }

        input:focus+.sliderC {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.sliderC:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .sliderC.round {
            border-radius: 34px;
        }

        .sliderC.round:before {
            border-radius: 50%;
        }
    </style>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Add New Coupon</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('coupons.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['route' => 'coupons.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Code:</strong>
                        {!! Form::text('code', null, ['placeholder' => 'code', 'class' => 'form-control']) !!}
                    </div>
                </div> --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {!! Form::number('price', null, ['placeholder' => 'price', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class="mb-3">
                        <input type="checkbox" value="1" name="is_active">&nbsp;&nbsp;<label for="featured"
                            class="form-label">Is Active?</label>
                    </label>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Coupon</button>
            <a href="{{ route('coupons.index') }}" class="btn btn-default">Back</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
