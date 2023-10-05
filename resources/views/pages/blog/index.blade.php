@extends('layout.default')
@section('content')
    <div class="row mb-5">
        @foreach($blogs as $blog)
            <div class="col-6 mb-10">
                <div class="card card-custom" style="height: 100% !important;">
                    <div class="card-body p-0 d-flex rounded" style="background:radial-gradient(94.09% 94.09% at 50% 50%, rgba(255, 255, 255, 0.45) 0%, rgba(255, 255, 255, 0) 100%), #FFA800;">
                        <div class="row m-0">
                            <div class="col-12">
                                <div class="card card-custom card-stretch card-transparent card-shadowless">
                                    <div class="card-body">
                                        <h3 class="font-size-h1-xl mb-0">
                                            {{$blog->title}}
                                        </h3>
                                        <a type="button" href="{{route('blog.view' , $blog->id)}}" class="font-size-lg font-size-h4-sm font-size-h6-lg font-size-h4-xl text-dark">More ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center fixed">
        {{$blogs->links('layout.pagination')}}
    </div>
@endsection


