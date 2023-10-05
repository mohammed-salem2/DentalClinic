@if(!\Illuminate\Support\Facades\Auth::check())
    @include('layout.base._header-mobile')
@endif
<div class="d-flex flex-column flex-root">
    @if(!\Illuminate\Support\Facades\Auth::check())
        @yield('login')
    @else
    <div class="d-flex flex-row flex-column-fluid page">
        @include('layout.base._aside')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('layout.base._header')
            <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="d-flex flex-column-fluid">
                    <div class="{{ Metronic::printClasses('content-container', false) }}">
                        <div class="alert alert-success mb-5 p-5" role="alert">
                            <h4 class="alert-heading">Advice</h4>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="footer bg-white py-4 d-flex flex-lg-column {{ Metronic::printClasses('footer', false) }}" id="kt_footer">
                <div class="{{ Metronic::printClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">{{ date("Y") }} &copy;</span>
                        <a href="/" class="text-dark-75">Dental Clinic</a>
                    </div>
                    <div class="nav nav-dark order-1 order-md-2">
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
<div id="kt_scrolltop" class="scrolltop">
    {{ Metronic::getSVG("media/svg/icons/Navigation/Up-2.svg") }}
</div>

