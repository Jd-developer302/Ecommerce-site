@extends('layouts.app-master')

@section('content')
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Promotions</h3>
            </div>
            {{-- <div class="card-toolbar">
                <a href="{{ route('promotions.create') }}" class="btn btn-sm btn-primary my-1">Add Category</a>
            </div> --}}
            <!--end::Heading-->
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
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
                        <tr>
                            <th class="thClass">No</th>
                            <th class="thClass">Title</th>
                            <th class="thClass">Sub Title</th>
                            <th class="thClass">Action</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($promotions as $item)
                            <tr>
                                <th scope="row" class="tdClass">{{ $item->id }}</th>
                                <td class="tdClass">{{ $item->title }}
                                <td class="tdClass">{{ $item->sub_title }}
                                </td>
                                <td class="tdClass">
                                    {{-- <a class="btn btn-warning btn-sm" href="{{ route('promotions.show', $item->id) }}"><i
                                            class="fa fa-eye"></i></a> --}}
                                    <a class="btn btn-info btn-sm" href="{{ route('promotions.edit', $item->id) }}"><i
                                            class="fa fa-edit"></i></a>
                                    {{-- {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['promotions.destroy', $item->id],
                                        'style' => 'display:inline',
                                    ]) !!} --}}
                                    {{-- {!! Form::button('<i class="fa fa-trash-alt icon-size"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]) !!}
                                    {!! Form::close() !!} --}}
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
@endsection
