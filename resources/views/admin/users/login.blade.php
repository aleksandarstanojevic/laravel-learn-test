@extends('admin.layouts.main-noauth')

@section('seo-title')
<title>{{ __('website.login') }}  {{ config('website.seo-separator') }} {{ config('app.name') }}</title>
@endsection

@section('custom-css')

@endsection

@section('content')
<!-- Basic login form-->
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header justify-content-center"><h3 class="fw-light my-4">{{ __('website.login') }}</h3></div>
    <div class="card-body">
        <!-- Login form-->
        <form method="POST" action="">
            @csrf
            <!-- Form Group (email address)-->
            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email</label>
                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter email address" name="email" value="{{ old('email') }}" />
                @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Form Group (password)-->
            <div class="mb-3">
                <label class="small mb-1" for="inputPassword">Password</label>
                <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                @error('password')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Form Group (login box)-->
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="auth-password-basic.html">Forgot Password?</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('custom-js')

@endsection