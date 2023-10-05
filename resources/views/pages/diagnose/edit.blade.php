@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('diagnose.update' , $diagnose->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row form-group">
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Diagnose</label>
                    </div>
                    <input name="diagnose" maxlength="40" value="{{$diagnose->diagnose}}" type="text" class="form-control form-control-lg @error('diagnose') is-invalid @enderror" autocomplete="off" required/>
                    @error('diagnose') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Date</label>
                    </div>
                    <input name="date" type="date" maxlength="20" value="{{$diagnose->date}}" class="form-control form-control-lg @error('date') is-invalid @enderror" autocomplete="off" required/>
                    @error('date') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Patient</label>
                    </div>
                    <select name="patient_id" class="form-control form-control-lg selectpicker" required>
                        @foreach($patients as $patient)
                            <option value="{{$patient->id}}" {{$patient->id == $diagnose->patient_id ? 'selected' : ''}}>{{$patient->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Details</label>
                    </div>
                    <textarea class="details @error('details') is-invalid @enderror" maxlength="1000" name="details" cols="194" rows="6" autofocus>{{$diagnose->details}}</textarea>
                    <span id="chars">1000</span> characters remaining
                    @error('details') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
