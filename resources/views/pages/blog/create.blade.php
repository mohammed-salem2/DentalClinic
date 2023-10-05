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
    <form id="form" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    {{$page_title ?? null}}
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-light-success font-weight-bold mr-2">Submit</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-12 mb-5">
                        <div class="d-flex">
                            <div class="symbol symbol-60 symbol-xxl-100 align-self-start align-self-xxl-center">
                                <div class="col-9">
                                    <div style="color: red">* required</div>
                                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-color: #CCCCCC">
                                        <div class="image-input-wrapper"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="Edit Profile Picture" data-original-title="Change Profile Picture">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Profile Picture">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="color: red">* required</div>
                <input name="title" placeholder="Title" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror mb-5" autocomplete="off" required/>
                @error('title') <span class="invalid-feedback">{{$message}}</span> @enderror
                <div style="color: red">* required</div>
                <div id="kt_quil_1" style="height: 325px">
                </div>
                <textarea name="subject" id="subject" hidden></textarea>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        KTQuilDemos.init();
        new KTImageInput('kt_user_add_avatar');
        new KTImageInput('kt_user_edit_avatar');
        new KTImageInput('kt_user_add_avatar_mobile');
        new KTImageInput('kt_user_edit_avatar_mobile');
        jQuery(document).ready(function() {
            // Mobile offcanvas for mobile mode
            new KTOffcanvas('kt_profile_aside', {
                overlay: true,
                baseClass: 'offcanvas-mobile',
                closeBy: 'kt_user_profile_aside_close',
                toggleBy: 'kt_subheader_mobile_toggle'
            });
        });
    </script>
@endsection



