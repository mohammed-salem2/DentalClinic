@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('schedule.store')}}">
        @csrf
        <div class="card-body">
            <div class="row form-group">
                <div class="col-12 mb-5">
                    <select name="day" class="form-control form-control-lg selectpicker" required>
                        <option value="Saturday" selected>Saturday</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                    </select>
                </div>
                <div class="col-6">
                    <select name="from" class="form-control form-control-lg selectpicker" required>
                        <option value="08:00" selected>08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="01:00">01:00</option>
                    </select>
                </div>
                <div class="col-6">
                    <select name="to" class="form-control form-control-lg selectpicker" required>
                        <option value="08:50" selected>08:50</option>
                        <option value="09:50">09:50</option>
                        <option value="10:50">10:50</option>
                        <option value="11:50">11:50</option>
                        <option value="12:50">12:50</option>
                        <option value="01:50">01:50</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
