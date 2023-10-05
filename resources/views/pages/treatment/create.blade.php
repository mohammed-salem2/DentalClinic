@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('treatment.store')}}">
        @csrf
        <div class="card-body">
            <div class="row form-group">
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Medicine</label>
                    </div>
                    <input name="medicine" maxlength="40" type="text" class="form-control form-control-lg @error('medicine') is-invalid @enderror" autocomplete="off" required/>
                    @error('medicine') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Date</label>
                    </div>
                    <input name="date" type="date" maxlength="20" class="form-control form-control-lg @error('date') is-invalid @enderror" autocomplete="off" required/>
                    @error('date') <span class="invalid-feedback">{{$message}}</span> @enderror
                </div>
                <div class="col-4 mb-5">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Patient</label>
                    </div>
                    <select name="patient_id" class="form-control form-control-lg selectpicker" required>
                        @foreach($patients as $patient)
                            <option value="{{$patient->id}}">{{$patient->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label font-weight-bolder text-dark fs-6 mb-0 user-select-none">Details</label>
                    </div>
                    <textarea class="details @error('details') is-invalid @enderror" maxlength="1000" name="details" cols="194" rows="6" autofocus></textarea>
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
