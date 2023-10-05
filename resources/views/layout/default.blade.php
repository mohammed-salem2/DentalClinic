<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="shortcut icon" href="{{ asset('media/custom/logo_ico.ico') }}" />
        {{ Metronic::getGoogleFontsInclude() }}
        <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
        @yield('styles')
    </head>
    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>
        @if($_SERVER['REQUEST_URI'] === '/' && \Illuminate\Support\Facades\Auth::check())
            <div class="page-loader page-loader-logo">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/custom/logo_loader.webp') }}"/>
                <div class="spinner spinner-primary"></div>
            </div>
        @endif
        @include('layout.base._layout')
        @yield('modals')
        <script> var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!}; </script>
        <script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
        @if(\Illuminate\Support\Facades\Session::get('alertData') != null)
            <script>
                $(document).ready(function (){
                    runToaster('{{@$alertData['message']}}' , '{{@$alertData['title']}}' , '{{@$alertData['type']}}');
                });
            </script>
        @endif
        @yield('scripts')
        <script>
            let array = @json(\App\Models\Advice::all()->all());
            $('.advise-content').remove();
            $('.alert').append('<p class="advise-content">'+array[Math.floor(Math.random()*array.length)].advice+'</p>');
        </script>
    </body>
</html>

