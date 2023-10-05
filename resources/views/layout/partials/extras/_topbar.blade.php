<div class="topbar">
    <div class="dropdown">
        <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
            <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                <span class="symbol symbol-35 symbol-light-success">
                    <span class="symbol-label font-size-h5 font-weight-bold">{{substr(\Illuminate\Support\Facades\Auth::user()->name , 0 , 1)}}</span>
                </span>
            </div>
        </div>
        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
            @include('layout.partials.extras.dropdown._user')
        </div>
    </div>
</div>
