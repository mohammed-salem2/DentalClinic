@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('file.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row form-group">
                <div class="col-12">
                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                    <input name="file" class="dropzone dropzone-default dropzone-success dz-clickable p-10 mt-5 @error('file') is-invalid @enderror" type="file" height="400" style="width: 100%;">
                    @error('file')
                    <span class="invalid-feedback text-danger mb-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary validate">Submit</button>
        </div>
    </form>
@endsection
