@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('user.update' , $user->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row form-group">
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Name</label>
                    </div>
                    <input name="name" maxlength="40" value="{{$user->name}}" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" autocomplete="off"/>
                    @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Email</label>
                    </div>
                    <input name="email" maxlength="40" value="{{$user->email}}" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" autocomplete="off"/>
                    @error('email') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Phone</label>
                    </div>
                    <input name="phone" maxlength="10" minlength="10" value="{{$user->phone}}" type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" autocomplete="off"/>
                    @error('phone') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Address</label>
                    </div>
                    <input name="address" maxlength="100" value="{{$user->address}}" type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" autocomplete="off"/>
                    @error('address') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-12 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">About</label>
                    </div>
                    <textarea maxlength="1000" class="details @error('about') is-invalid @enderror" name="about" cols="194" rows="6" autofocus>{{$user->about}}</textarea>
                    <span id="chars">1000</span> characters remaining
                    @error('about') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-6">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Password</label>
                    </div>
                    <div class="fv-row mb-5" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">
                                <input maxlength="8" minlength="8" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="******" autocomplete="new-password"/>
                                @error('password') <span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="text-muted">
                            Password should be 8 characters
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Password Confirmation</label>
                    </div>
                    <div class="fv-row mb-5" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">
                                <input maxlength="8" minlength="8" name="password_confirmation" type="password" class="form-control form-control-lg" placeholder="******" />
                            </div>
                        </div>
                        <div class="text-muted">
                            Password should be 8 characters
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
