@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('advice.update' , $advice->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row form-group">
                <div class="col-12">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Advice</label>
                    </div>
                    <textarea class="details @error('advice') is-invalid @enderror" name="advice" maxlength="1000" cols="194" rows="6" autofocus>{{$advice->advice}}</textarea>
                    <span id="chars">1000</span> characters remaining
                    @error('advice') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection

