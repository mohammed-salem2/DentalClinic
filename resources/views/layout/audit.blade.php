@extends('layout.default')

@section('content')
    <div class="row">
        <div class="col-12 mb-7">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title font-size-lg font-weight-bolder mx-auto">
                        Action Details
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">User Name</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->user->name}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">User Account Number</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->user->account_id}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">Action</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->event}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">Date</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->created_at}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">IP ADDRESS</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->ip_address}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-dark-50 font-size-h3-lg mb-3 font-weight-bolder">Role</div>
                            <div class="font-size-h3-lg font-weight-bolder mb-10">{{$audit->user->roles->first()->name}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($audit->event != 'created')
        <div class="@if($audit->event != 'deleted') col-md-6 @else col-12 @endif">
            <div class="card card-custom">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title font-size-lg font-weight-bolder justify-content-lg-start">
                        Data Before The Action
                    </h3>
                    <div class="card-title justify-content-end">
                    <span class="red svg-icon svg-icon-primary svg-icon-2x"><!--media/svg/icons/Navigation/Arrow-down.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <rect fill="#000000" opacity="0.3" x="11" y="5" width="2" height="14" rx="1"/>
                                <path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999) "/>
                            </g>
                        </svg>
                    </span>
                    </div>
                </div>
                <div class="card-body">
                    @yield('down-card-row')
                </div>
            </div>
        </div>
        @endif
        @if($audit->event != 'deleted')
            <div class="@if($audit->event != 'created') col-md-6 @else col-12 @endif">
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title font-size-lg font-weight-bolder justify-content-lg-start">
                            Data After The Action
                        </h3>
                        <div class="card-title justify-content-end">
                            <span class="green svg-icon svg-icon-primary svg-icon-2x"><!--media/svg/icons/Navigation/Arrow-up.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <rect fill="#000000" opacity="0.3" x="11" y="5" width="2" height="14" rx="1"/>
                                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        @yield('up-card-row')
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

