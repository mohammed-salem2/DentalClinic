@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('category.store')}}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <input name="name" placeholder="Category Name" maxlength="20" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" autocomplete="off" required/>
                    @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
