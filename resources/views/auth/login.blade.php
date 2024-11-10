@extends('layouts.app')

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Login -->
        <div class="card">

            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a class="app-brand-link">
                  <span class="app-brand-logo demo">
                      <img src="{{ asset('public/assets/img/logo/512x512.png') }}" alt="chedis" style="width:  50px; height: auto;">
                  </span>
                  <span class="app-brand-text demo menu-text fw-bold ms-3" style="text-align: center;">
                      <span style="font-size: 1.1em;">Supply</span><br>
                      <span style="font-size: 0.5em;">Inventory System</span>
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label for="login" class="col-md-6 col-form-label text-md">{{ __('Email or Username') }}</label>
                  <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Enter your email or username">
                  @error('login')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label for="password" class="col-md-4 col-form-label text-md">{{ __('Password') }}</label>
                    <div class="input-group input-group-merge">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
</div>

@if (Session::has('message'))
<script>
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-top-right"
    }
    toastr.success("{{ Session::get('message') }}");
</script>
@endif

@if (@session('session_expired'))
    <script>
        swal("Session Expired", "Your session has expired. Please log in again.", "warning");
    </script>
@endif
@endsection
