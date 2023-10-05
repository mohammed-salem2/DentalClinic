@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('user.changeCategory' , $user->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <select class="form-control form-control-lg ml-3 selectpicker" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($category->id == ($user->category != null ? $user->category->id : null)) ? 'selected' : ''}} >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary validate">Submit</button>
        </div>
    </form>
@endsection
