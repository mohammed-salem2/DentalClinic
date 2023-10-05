<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo pt-2">
            <a href="{{ url('/') }}"><h2><strong style="color: whitesmoke">Dental Clinic</strong></h2></a>
        </div>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
        </button>
    </div>

    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Admin'))
                    {{ Menu::renderVerMenu(config('menu_aside.Admin')) }}
                @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('Doctor'))
                    {{ Menu::renderVerMenu(config('menu_aside.Doctor')) }}
                @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('Patient'))
                    {{ Menu::renderVerMenu(config('menu_aside.Patient')) }}
                @endif
            </ul>
        </div>
    </div>
</div>
