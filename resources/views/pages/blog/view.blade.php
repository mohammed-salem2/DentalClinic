@extends('layout.default')
@section('styles')
    <style>
        img{
            max-width: 100%;
            max-height: 100%;
            display: block; /* remove extra space below image */
        }
    </style>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label font-weight-bolder user-select-none">
                    {{$page_title ?? null}}
                </h3>
            </div>
            @role('Admin|Doctor')
            <div class="card-toolbar tr-container">
                <a href="{{route('blog.edit' , $blog->id)}}" class="btn btn-light-success font-weight-bold mr-2">Edit</a>
                <a type="button" data-id="{{$blog->id}}" data-location="{{route('blog.index')}}" data-url="blog" data-name="Blog" class="btn btn-light-danger font-weight-bold mr-2 delete">Delete</a>
            </div>
            @endrole
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 mb-5" style="margin-left: 20%">
                    <img class="text-center" src="{{asset($blog->logo)}}" alt="Cloudy Sky">
                </div>
                <div class="col-6 mb-5" style="margin-left: 20%">
                    <p>
                        {!! $blog->subject !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection



