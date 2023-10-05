@extends('layout.formStructure')
@section('body')
    <div class="card-body">
        <div class="row">
            <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('{{asset('/media/error/bg6.jpg')}}');height: 700px">
                <div class="d-flex flex-column flex-row-fluid text-center">
                    <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">Locked</h1>
                    <p class="display-4 font-weight-bold text-white">You Are Not Authorized</p>
                </div>
            </div>
        </div>
    </div>
@endsection
