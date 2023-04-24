@extends('admin.layouts.main')

@section('seo-title')
<title>{{ __('Create new user') }}  {{ config('website.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Create new category                  </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3"></div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4">
    <div class="row">
        <div class="col-lg-9">
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Insert new category data and save</div>
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form method="post" action="{{ route('categories.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <br>
                                        <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                                        @error('description')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="text">Text</label>
                                        <textarea id="text" name="text">{!! old('text') !!}</textarea>
                                        @error('text')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="active">Active</label>
                                        <br>
                                        <input class="form-check-input" type="radio" name="active" id="active" value="1" checked>
                                        <label class="form-check-label" for="active">
                                            Yes
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="active" id="active" value="0">
                                        <label class="form-check-label" for="active">
                                            No
                                        </label>
                                    </div>
                                    

                                    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                                    <script>
                                        ClassicEditor
                                            .create( document.querySelector( '#text' ) )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>

                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary mt-3" type="submit" name="submit">Add category</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom-js')

@endsection

