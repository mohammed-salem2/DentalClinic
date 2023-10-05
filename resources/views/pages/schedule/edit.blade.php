@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('schedule.update' , $schedule->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row form-group">
                <div class="col-12 mb-5">
                    <select name="day" class="form-control form-control-lg selectpicker" required>
                        <option value="Saturday" {{$schedule->day == 'Saturday' ? 'selected' : ''}} >Saturday</option>
                        <option value="Sunday" {{$schedule->day == 'Sunday' ? 'selected' : ''}} >Sunday</option>
                        <option value="Monday"{{$schedule->day == 'Monday' ? 'selected' : ''}}>Monday</option>
                        <option value="Tuesday"{{$schedule->day == 'Tuesday' ? 'selected' : ''}}>Tuesday</option>
                        <option value="Wednesday"{{$schedule->day == 'Wednesday' ? 'selected' : ''}}>Wednesday</option>
                        <option value="Thursday"{{$schedule->day == 'Thursday' ? 'selected' : ''}}>Thursday</option>
                    </select>
                </div>
                <div class="col-6">
                    <select name="from" class="form-control form-control-lg selectpicker" required>
                        <option value="08:00" {{$schedule->from == '08:00' ? 'selected' : ''}} >08:00</option>
                        <option value="09:00" {{$schedule->from == '09:00' ? 'selected' : ''}} >09:00</option>
                        <option value="10:00" {{$schedule->from == '10:00' ? 'selected' : ''}} >10:00</option>
                        <option value="11:00" {{$schedule->from == '11:00' ? 'selected' : ''}} >11:00</option>
                        <option value="12:00" {{$schedule->from == '12:00' ? 'selected' : ''}} >12:00</option>
                        <option value="01:00" {{$schedule->from == '01:00' ? 'selected' : ''}} >01:00</option>
                    </select>
                </div>
                <div class="col-6">
                    <select name="to" class="form-control form-control-lg selectpicker" required>
                        <option value="08:50" {{$schedule->to == '08:50' ? 'selected' : ''}} >08:50</option>
                        <option value="09:50" {{$schedule->to == '09:50' ? 'selected' : ''}} >09:50</option>
                        <option value="10:50" {{$schedule->to == '10:50' ? 'selected' : ''}} >10:50</option>
                        <option value="11:50" {{$schedule->to == '11:50' ? 'selected' : ''}} >11:50</option>
                        <option value="12:50" {{$schedule->to == '12:50' ? 'selected' : ''}} >12:50</option>
                        <option value="01:50" {{$schedule->to == '01:50' ? 'selected' : ''}} >01:50</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
