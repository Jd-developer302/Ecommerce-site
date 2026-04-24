@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Attribute Details</h1>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ $attributedetail->name }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        @include('layouts.partials.messages')

                        <div class="table-responsive">
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr style="background-color: #E4A11B;">
                                        <th class="thClass">No</th>
                                        <th class="thClass">Value</th>
                                        <th class="thClass">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-6 fw-semibold text-gray-600">
                                    @foreach ($values as $key => $item)
                                        <tr>
                                            <th scope="row" class="tdClass">{{ $key + 1 }}</th>
                                            <td class="tdClass">{{ $item->value }}</td>

                                            <td class="tdClass">
                                                <a href="{{ route('attributevalue.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['attributevalue.destroy', $item->id],
                                                    'id' => 'delete-form-' . $item->id,
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'onclick' => "confirmDelete(event, 'delete-form-{$item->id}')",
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h1>Add Value</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attributes.valueStore', $attribute_id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input value="{{ old('value') }}" type="text" class="form-control" name="value"
                                placeholder="Value" required>

                            @if ($errors->has('value'))
                                <span class="text-danger text-left">{{ $errors->first('value') }}</span>
                            @endif
                        </div>

                        <button type="submit" id="butsave" class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>
        </div>
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
