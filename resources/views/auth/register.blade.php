@extends('layout.default')
@section('styles')
    <link href="{{asset('css/pages/login/classic/login-3.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('login')
<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
    <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('{{asset('media/assets/guest.jpg')}}');">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
            <div class="mb-10">
                <h1 class="d-flex flex-center ml-5"><img src="{{asset('media/assets/logo.png')}}" style="width: 50%" alt="" /></h1>
                <h3>Registration To The Control Panel</h3>
                <p class="opacity-60 font-weight-bold">Please Enter Your Information</p>
            </div>
            <form method="POST" action="{{$_SERVER['REQUEST_URI'] === '/register-as-doctor' ? route('storeDoctor') : route('storePatient')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 justify-content-center">
                    <div class="col-12">
                        <input id="name" maxlength="40" type="text" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback text-white mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input id="email" maxlength="40" type="email" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback text-white mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input id="phone" maxlength="10" minlength="10" type="tel" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback text-white mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input id="address" maxlength="100" type="text" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address" required autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback text-white mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input id="password" maxlength="8" minlength="8" type="password" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback text-white mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input id="password-confirm" maxlength="8" minlength="8" type="password" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" name="password_confirmation" placeholder="Password Confirm" required autocomplete="new-password">
                    </div>
                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 mr-5">
                            {{ __('Register') }}
                        </button>
                        <a type="button" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3" href="{{route('login')}}">Sign In</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
