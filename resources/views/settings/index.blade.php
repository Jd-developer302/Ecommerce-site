@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Update Header Content</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="card-body">
            <form method="post" action="{{ route('settings.update', $setting->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Keywords</label>
                    <input value="{{ $setting->keywords }}" type="text" class="form-control" name="keywords"
                        placeholder="Keywords" required>

                    @if ($errors->has('keywords'))
                        <span class="text-danger text-left">{{ $errors->first('keywords') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea value="{{ old('description') }}" type="text" class="form-control" name="description" required
                        placeholder="Description">{{ $setting->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="pixels" class="form-label">Pixels</label>
                    <textarea value="{{ old('pixels') }}" type="text" class="form-control" name="pixels"
                        placeholder="Paste pixels here...">{{ $setting->pixels }}</textarea>
                    @if ($errors->has('pixels'))
                        <span class="text-danger text-left">{{ $errors->first('pixels') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner 1</label>
                    <input value="{{ old('banner1') }}" type="file" class="form-control" name="banner1"
                        placeholder="Class">
                    <img src="/banner/{{ $setting->banner1 }}" width="300px">
                    @if (!is_null($setting->banner1))
                        <a href="{{ route('banner.delete', ['banner' => 'banner1']) }}">
                            <i class="fa fa-trash" style="color: rgb(184, 6, 6)"></i>
                        </a>
                    @endif

                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner 2</label>
                    <input value="{{ old('banner2') }}" type="file" class="form-control" name="banner2"
                        placeholder="Class">
                    <img src="/banner/{{ $setting->banner2 }}" width="300px">
                    @if (!is_null($setting->banner2))
                        <a href="{{ route('banner.delete', ['banner' => 'banner2']) }}">
                            <i class="fa fa-trash" style="color: rgb(184, 6, 6)"></i>
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner 3</label>
                    <input value="{{ old('banner3') }}" type="file" class="form-control" name="banner3"
                        placeholder="Class">
                    <img src="/banner/{{ $setting->banner3 }}" width="300px">
                    @if (!is_null($setting->banner3))
                        <a href="{{ route('banner.delete', ['banner' => 'banner3']) }}">
                            <i class="fa fa-trash" style="color: rgb(184, 6, 6)"></i>
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner 4</label>
                    <input value="{{ old('banner4') }}" type="file" class="form-control" name="banner4"
                        placeholder="Class">
                    <img src="/banner/{{ $setting->banner4 }}" width="300px">
                    @if (!is_null($setting->banner4))
                        <a href="{{ route('banner.delete', ['banner' => 'banner4']) }}">
                            <i class="fa fa-trash" style="color: rgb(184, 6, 6)"></i>
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label">Banner 5</label>
                    <input value="{{ old('banner5') }}" type="file" class="form-control" name="banner5"
                        placeholder="Class">
                    <img src="/banner/{{ $setting->banner5 }}" width="300px">
                    @if (!is_null($setting->banner5))
                        <a href="{{ route('banner.delete', ['banner' => 'banner5']) }}">
                            <i class="fa fa-trash" style="color: rgb(184, 6, 6)"></i>
                        </a>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Update setting</button>
                <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection
