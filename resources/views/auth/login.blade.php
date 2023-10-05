@extends('layout.default')
@section('styles')
    <link href="{{asset('css/pages/login/classic/login-3.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('login')
    <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('{{asset('media/assets/guest.jpg')}}');">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <div class="login-signin">
                    <h1 class="d-flex flex-center ml-5"><img src="{{asset('media/assets/logo.png')}}" style="width: 50%" alt=""/></h1>
                    <div class="mb-15">
                        <h3>Login To The Control Panel</h3>
                        <p class="opacity-60 font-weight-bold">Please Enter Your Account ID & Password</p>
                    </div>
                    <div class="form-group text-center d-flex justify-content-between">
                        <a type="button" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3" href="{{route('registerDoctor')}}">SignUp Doctor</a>
                        <a type="button" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3" href="{{route('registerPatient')}}">SignUp Patient</a>
                    </div>
                    <div class="form-group">
                        <input maxlength="9" minlength="9" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Ex: 202260001" name="account_id" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input maxlength="8" minlength="8" class="form-control h-auto text-white font-weight-bolder bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="******" name="password" />
                    </div>
                    <div class="form-group text-center mt-10">
                        <button id="kt_login_signin_submit" type="button" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 mr-5">Sign In</button>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="form-check">
                            <div class="form-group row">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-success text-white font-size-h5-md">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        <span></span>
                                        <strong>Remember Me</strong>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
