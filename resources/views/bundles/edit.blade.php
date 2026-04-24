@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <style>
        table,
        td,
        th {
            border: 1px solid #2c2b2b !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Edit Bundle</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('bundles.index') }}" class="btn btn-sm btn-primary">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="POST" action="{{ route('bundles.update', $bundle->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="page-header">
                    <h1 class="page-title">Products</h1>
                    <div>
                        <ol class="breadcrumb">
                            <button type="button" name="add" id="dynamic-ar"
                                class="btn btn-outline-primary btn-primary">Add Product</button>
                        </ol>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr style="background-color: #E4A11B;">
                                <td align='center'>Name</td>
                                <td align='center'>Quantity</td>
                                <td align='center'>Image</td>
                                <td align='center'>Action</td>
                            </tr>
                            @foreach ($added as $item)
                                <tr>
                                    <td align='center'>{{ $item->name }}</td>
                                    <td align='center'>{{ $item->quantity }}</td>
                                    <td align='center'><img src="{{ URL::asset('image/' . $item->image) }}" alt="bundle"
                                            width="50px"></td>
                                    <td align='center'><a href="{{ route('bundleline.destroy', ['id' => $item->id]) }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ $bundle->name }}" type="text" class="form-control" name="name"
                        placeholder="Name" />

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" value="{{ $bundle->price }}" type="text" class="form-control" name="price"
                        placeholder="Price" />

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="delivery_charge" class="form-label">Delivery Charge</label>
                    <input value="{{ $bundle->delivery_charge }}" type="number" class="form-control"
                        name="delivery_charge" placeholder="Delivery Charge" min="0" required>
                    @if ($errors->has('delivery_charge'))
                        <span class="text-danger text-left">{{ $errors->first('delivery_charge') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea value="{{ $bundle->description }}" type="text" id="summernote"  class="form-control" name="description"
                        placeholder="Description">{{ $bundle->description }}</textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Description',
                            tabsize: 2,
                            height: 120,
                            toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'underline', 'clear']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['table', ['table']],
                                ['insert', ['link', 'picture', 'video']],
                                ['view', ['fullscreen', 'codeview', 'help']]
                            ]
                        });
                    </script>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Thumbnail</label>
                    <input value="{{ old('image') }}" type="file" class="form-control" name="image">
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                    <img src="{{ URL::asset('image/' . $bundle->image) }}" alt="bundle" width="50px">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Images</label>
                    <input value="{{ old('images') }}" type="file" class="form-control" name="images[]"
                        placeholder="Class" multiple>
                    @if ($errors->has('images'))
                        <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="is_vat" class="form-label">Vat?</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="is_vat"
                            @if (old('is_vat', $bundle->is_vat)) checked @endif>

                    </label>
                </div>
                {{-- @foreach ($images as $item)
                    <a href="{{ route('image.show', ['id' => $item->id, 'parameter' => $product->id]) }}">
                        <img src="/images/{{ $item->image }}" width="100px"><i class="fa fa-trash"
                            style="color: brown"></i>
                    </a>
                @endforeach --}}

                <br>

                <button type="submit" class="btn btn-primary">Edit Bundle</button>
                <a href="{{ route('bundles.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        var options = "<option>--select product--</option>";
        var products = <?= $products ?>;
        for (i = 0; i < products.length; i++) {
            options = options + "<option value=" + products[i]['id'] + " data-price=" + products[i]['price'] +
                " data-name=" + products[i]['name'] + ">" + products[i]['name'] + "</option>";
        }
        // Iterate over object and add options to select

        var j = -1;
        $("#dynamic-ar").click(function() {
            ++j;
            $("#dynamicAddRemove").append(
                '<tr><td  align="center" width="20%"><select name="orderline[' + j +
                '][product_id]" id="productid" class="mySelect form-control" required>' +
                options + ' </select></td><td align="center"><input type="number" name="orderline[' +
                j +
                '][quantity]" placeholder="Quantity" value="0" class="form-control quantity" min="1" required /><input type="hidden" name="orderline[' +
                j +
                '][name]" placeholder="Enter Price" value="" class="form-control product-name"/></td><td align="center"><input type="file" name="orderline[' +
                j +
                '][image]" value="" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
            // $.each(products, function(index, value) {
            //     $("<option/>", {
            //         value: index, 
            //         text: value
            //     }).appendTo(selectElem);
            // });
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
            j--;
        });
        $(document).on('change', '.mySelect', function() {
            var row = $(this).closest("tr");
            var selectedOption = $(this).find(":selected");
            // var unitPrice = selectedOption.data("price");
            var name = selectedOption.data("name");
            // row.find(".unit-price").val(unitPrice);
            row.find(".product-name").val(name);
            row.find(".quantity").val(0);
        });
    </script>
@endsection
