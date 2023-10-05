@extends('layout.formStructure')
@section('styles')
    <style>
        div.form-control{
            background-color: #b5bcc8 !important;
        }
    </style>
@endsection
@section('toolbar')
        <a class="btn btn-sm btn-clean btn-icon register" data-id="{{$registration->id}}" data-status="1" data-phone="{{$registration->phone}}" data-type="{{$registration->type}}" data-address="{{$registration->address}}" title="Accept" data-toggle="tooltip">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                    </g>
                </svg>
            </span>
        </a>
        <a class="btn btn-sm btn-clean btn-icon register" data-id="{{$registration->id}}" data-status="2" data-phone="{{$registration->phone}}" data-type="{{$registration->type}}" data-address="{{$registration->address}}" title="Cancel" data-toggle="tooltip">
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>
                    </g>
                </svg>
            </span>
        </a>
@endsection
@section('body')
        <div class="card-body">
            <div class="row form-group">
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Name</label>
                    </div>
                    <div class="form-control form-control-lg" disabled>{{$registration->name}}</div>
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Email</label>
                    </div>
                    <div class="form-control form-control-lg" disabled="">{{$registration->email}}</div>
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Phone</label>
                    </div>
                    <div class="form-control form-control-lg" disabled="">{{$registration->phone}}</div>
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Type</label>
                    </div>
                    <div class="form-control form-control-lg" disabled="">{{$registration->type == 2 ? 'Patient' : 'Doctor'}}</div>
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Address</label>
                    </div>
                    <div class="form-control form-control-lg" disabled="">{{$registration->address}}</div>
                </div>
                <div class="col-6 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Created At</label>
                    </div>
                    <div class="form-control form-control-lg" disabled="">{{$registration->created_at}}</div>
                </div>
                @if($registration->type == 1)
                <div class="col-12" data-type="2">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Category</label>
                    </div>
                    <select class="form-control selectpicker" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
        </div>
@endsection

