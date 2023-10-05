@extends('layout.default')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title font-weight-bolder user-select-none">
                {{$page_title ?? null}}
            </div>
            @yield('card-toolbar')
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            @yield('table')
        </div>
        @yield('footer')
    </div>
@endsection
@section('scripts')
    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}">tableRendering();</script>
@endsection
