@extends('layout.formStructure')
@section('body')
    <form id="form" method="POST" action="{{route('appointment.store')}}">
        @csrf
        <div class="card-body">
            <div class="row form-group">
                @role('Doctor')
                    <div class="col-12 mb-5">
                        <select name="patient_id" class="form-control form-control-lg selectpicker patients" required>
                            @foreach($patients as $patient)
                                <option class="patient" value="{{$patient->id}}">{{$patient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endrole
                @role('Patient')
                    <div class="col-6">
                        <select name="doctor_id" class="form-control form-control-lg selectpicker doctors" required>
                            @foreach($doctors as $doctor)
                                <option class="doctor" value="{{$doctor->id}}">{{$doctor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endrole
                <div class="{{$user->hasRole('Doctor') ? 'col-12' : 'col-6'}}">
                    <select name="schedule_id" class="form-control form-control-lg schedules {{$user->hasRole('Doctor') ? 'selectpicker' : ''}}" required>
                        @role('Doctor')
                            @foreach($user->schedules as $schedule)
                                <option class="doctor" value="{{$schedule->id}}">{{$schedule->day}} / {{$schedule->time}}</option>
                            @endforeach
                        @endrole
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            let id = $('select.doctors').find("option:selected").val();
            getDoctorSchedules(id);
        });
    </script>
@endsection
