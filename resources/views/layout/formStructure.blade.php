@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label font-weight-bolder user-select-none">
                    {{$page_title ?? null}}
                </h3>
            </div>
            <div class="card-toolbar">
                @yield('toolbar')
            </div>
        </div>
        @yield('body')
    </div>
    @yield('overview')
@endsection
