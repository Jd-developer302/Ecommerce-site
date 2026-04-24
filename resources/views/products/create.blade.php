@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
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

        .btn-dark.add-price-row:hover {
            color: #fff !important;
            background-color: #000 !important;
            border-color: #000 !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/content@0.8.18/dist/content.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/content@0.8.18/dist/content.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Add New Product</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label">Categories</label>
                    <select class="form-control" name="category_id" required>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('categories'))
                        <span class="text-danger text-left">{{ $errors->first('categories') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Thumbnail</label>
                    <input value="{{ old('image') }}" type="file" class="form-control" name="image"
                        placeholder="Class" required>
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
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
                    <label for="brand" class="form-label">Brand</label>
                    <input value="{{ old('brand') }}" type="text" class="form-control" name="brand"
                        placeholder="Brand" required>
                    @if ($errors->has('brand'))
                        <span class="text-danger text-left">{{ $errors->first('brand') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Prices (Quantity wise)</label>
                    <div id="prices-section">
                        <div class="row price-row mb-2">
                            <div class="col">
                                <input type="number" name="prices[0][quantity]" class="form-control" placeholder="Quantity">
                            </div>
                            <div class="col">
                                <input type="number" name="prices[0][cost]" class="form-control" placeholder="Price" step="any">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-dark add-price-row text-white">Add more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="old_price" class="form-label">Old Price</label>
                    <input value="{{ old('old_price') }}" type="number" class="form-control" name="old_price"
                        placeholder="Old Price" required>
                    @if ($errors->has('old_price'))
                        <span class="text-danger text-left">{{ $errors->first('old_price') }}</span>
                    @endif
                </div>
                {{--
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ old('price') }}" type="number" class="form-control" name="price"
                        placeholder="Price" required>
                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                --}}
                <div class="mb-3">
                    <label for="cost_per_product" class="form-label">Item Per Product</label>
                    <input type="number" name="cost_per_product" min="1" step="0.001"
                        value="{{ old('cost_per_product', 1) }}" class="form-control" />
                    @if ($errors->has('cost_per_product'))
                        <span class="text-danger text-left">{{ $errors->first('cost_per_product') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input value="{{ old('variants') }}" type="number" class="form-control" name="stock"
                        placeholder="stock" min="0" required>
                    @if ($errors->has('stock'))
                        <span class="text-danger text-left">{{ $errors->first('stock') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="badge" class="form-label">Badge</label>
                    <input value="{{ old('badge') }}" type="text" class="form-control" name="badge"
                        placeholder="Badge" required>
                    @if ($errors->has('badge'))
                        <span class="text-danger text-left">{{ $errors->first('badge') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="delivery_charge" class="form-label">Delivery Charge</label>
                    <input value="{{ old('delivery_charge') }}" type="number" class="form-control"
                        name="delivery_charge" placeholder="Delivery Charge" min="0" required>
                    @if ($errors->has('delivery_charge'))
                        <span class="text-danger text-left">{{ $errors->first('delivery_charge') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea value="{{ old('description') }}" type="text" class="form-control" id="summernote" name="description"
                        placeholder="Description">{{ old('description') }}</textarea>
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
                    <label for="description" class="form-label">Specifications</label>
                    <textarea value="{{ old('description') }}" type="text" class="form-control" id="summernote1"
                        name="specification" placeholder="Specification">{{ old('specifications') }}</textarea>
                    @if ($errors->has('specifications'))
                        <span class="text-danger text-left">{{ $errors->first('specifications') }}</span>
                    @endif
                    <script>
                        $('#summernote1').summernote({
                            placeholder: 'Specifications',
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 mb-3">
                        <label for="is_vat" class="form-label">Vat?</label>
                        <label class="switch mb-3">
                            <input type="checkbox" value="1" name="is_vat" checked>

                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 mb-3">
                        <label for="is_featured" class="form-label">New Arrival</label>
                        <label class="switch mb-3">
                            <input type="checkbox" value="1" name="is_newarrival">

                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 mb-3">
                        <label for="mega_deal" class="form-label">Mega Deal</label>
                        <label class="switch mb-3">
                            <input type="checkbox" value="1" name="mega_deal">

                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 mb-3">
                        <label for="mega_deal" class="form-label">Mega Offer</label>
                        <label class="switch mb-3">
                            <input type="checkbox" value="1" name="is_mega_offer">

                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <label for="attributes" class="form-label">Atributes</label>
                    <select class="select2-multiple form-control" name="tags[]" multiple="multiple"
                        id="select2Multiple">
                        @foreach ($attributes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('attributes'))
                        <span class="text-danger text-left">{{ $errors->first('attributes') }}</span>
                    @endif
                </div>
                <div class="mb-3" id="attribute_values">
                    <label for="attributes_values" class="form-label">Atribute Values </label>
                    <select class="select2-multiple form-control" name="tags1[]" multiple="multiple"
                        id="select2Multiple1">
                        <option value="">-- select --</option>
                    </select>
                    @if ($errors->has('attribute_values'))
                        <span class="text-danger text-left">{{ $errors->first('attributes') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="attributes values" class="form-label">Atributes Details</label>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="empTable">
                            <tr></tr>
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Is Active?</label><br>
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="is_active">

                    </label>
                </div>
                <div class="mb-3">
                    <input type='hidden' class='form-control' name='attr_id_order' value='' id='attr_id_order'>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Save Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content1'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>
    <script type='text/javascript'>
        var cc = 0;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('#select2Multiple').change(function() {
                var attributes = $('#select2Multiple').val();
                var cc = attributes.length;

                if (attributes != "") {

                    // AJAX POST request
                    // $.ajax({
                    //     url: '/getAttributesCombinations',
                    //     type: 'post',
                    //     data: {
                    //         _token: CSRF_TOKEN,
                    //         attributes: attributes
                    //     },
                    //     dataType: 'json',
                    //     success: function(response) {

                    //         createRows(response);

                    //     }
                    // });
                    var selectedValue = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '/get-attributes-options',
                        data: {
                            _token: CSRF_TOKEN,
                            attributes: attributes
                        },
                        dataType: 'json',
                        success: function(data) {
                            var options = '';
                            $.each(data, function(index, item) {
                                options += '<option value="' + item.id + '">' + item
                                    .value + '</option>';
                            });
                            $("#select2Multiple1").append(options);
                        }
                    });
                }

            });
            $('#select2Multiple1').change(function() {
                var attributes = $('#select2Multiple').val();
                var attributeValues = $('#select2Multiple1').val();
                var cc = attributeValues.length;

                if (attributeValues != "") {
                    $.ajax({
                        url: '/getAttributesCombinations',
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            attribute_values: attributeValues,
                            attributes: attributes
                        },
                        dataType: 'json',
                        success: function(response) {

                            createRows(response);

                        }
                    });
                }
            });
        });
        // Create table rows
        function createRows(response) {
            var len = 0;
            $('#empTable tbody').empty(); // Empty <tbody>
            if (response['data'] != null) {
                len = response['data'].length;
            }
            var attributes_values = [];
            var attributes_values = response['attributes_values'];
            var cc = response['cc'];
            var tr_str = "<tr>" +
                "<td>" + 'Combination' + "</td>" +
                "<td>" + 'Price' + "</td>" +
                "<td>" + 'SKU' + "</td>" +
                "<td>" + 'Stock' + "</td>" +
                "<td>" + 'Image' + "</td>" +
                "</tr>";
            $("#empTable tbody").append(tr_str);
            if (cc > 1) {
                if (len > 0) {
                    var arrlen = 0;
                    var arrlen = response['data'][0].length;
                    for (var i = 0; i < len; i++) {
                        var str = "";
                        for (var j = 0; j < arrlen; j++) {
                            if (j != arrlen - 1) {
                                var str = str + response['data'][i][j] + '-';
                            } else {
                                var str = str + response['data'][i][j];
                            }
                        }

                        var tr_str = "<tr>" +
                            "<td align='center'>" + str + "</td>" +
                            "<td align='center'><input type='hidden' class='form-control' name='moreFields[" + i +
                            "][combination]' id='' value=" + str +
                            "><input type='number' class='form-control' name='moreFields[" + i + "][price]' id='' ></td>" +
                            "<td align='center'><input type='text' class='form-control' name='moreFields[" + i +
                            "][sku]' id=''  ></td>" +
                            "<td align='center'><input type='number' class='form-control' name='moreFields[" + i +
                            "][stock]' id=''  ></td>" +
                            "<td align='center'><input type='file' class='form-control' name='moreFields[" + i +
                            "][image]' id=''  ></td>";

                        $("#empTable tbody").append(tr_str);
                    }
                } else {
                    var tr_str = "<tr>" +
                        "<td align='center' colspan='5'>No record found.</td>" +
                        "</tr>";

                    $("#empTable tbody").append(tr_str);
                }
            } else if (cc == 1) {
                for (var i = 0; i < len; i++) {
                    var left = response['data'][i];

                    var tr_str = "<tr>" +
                        "<td align='center'>" + left + "</td>" +
                        "<td align='center'><input type='hidden' class='form-control' name='moreFields[" + i +
                        "][combination]' id='' value=" + left +
                        "><input type='number' class='form-control' name='moreFields[" + i + "][price]' id='' ></td>" +
                        "<td align='center'><input type='text' class='form-control' name='moreFields[" + i +
                        "][sku]' id=''  ></td>" +
                        "<td align='center'><input type='number' class='form-control' name='moreFields[" + i +
                        "][stock]' id=''  ></td>" +
                        "<td align='center'><input type='file' class='form-control' name='moreFields[" + i +
                        "][image]' id=''  ></td>";

                    $("#empTable tbody").append(tr_str);
                }

            }
            $('#attr').empty();
            $("#attr_id_order").val(JSON.stringify(attributes_values));
        }
    </script>
    <script>
        $(document).ready(function() {
            let priceIndex = 1;
            $('#prices-section').on('click', '.add-price-row', function() {
                $('#prices-section').append(`
                    <div class=\"row price-row mb-2\">
                        <div class=\"col\">
                            <input type=\"number\" name=\"prices[${priceIndex}][quantity]\" class=\"form-control\" placeholder=\"Quantity\">
                        </div>
                        <div class=\"col\">
                            <input type=\"number\" name=\"prices[${priceIndex}][cost]\" class=\"form-control\" placeholder=\"Price\" step=\"any\">
                        </div>
                        <div class=\"col-auto\">
                            <button type=\"button\" class=\"btn btn-danger remove-price-row\">Remove</button>
                        </div>
                    </div>
                `);
                priceIndex++;
            });
            $('#prices-section').on('click', '.remove-price-row', function() {
                $(this).closest('.price-row').remove();
            });
        });
    </script>
@endsection
