<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        if (Auth::user()->hasRole('Admin')) return abortView();
        return view('pages.appointment.create' , [
            'page_title' => 'Create Appointment',
            'alertData' => Session::get('alertData'),
            'user' => Auth::user(),
            'patients' => User::patients()->get(),
            'doctors' => User::doctors()->get(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if (request('user_id') != null)
            $user = User::findOrFail(request('user_id'));
        else
            $user = Auth::user();

        if ($user->hasRole('Admin')) return abortView();
        if ($user->hasRole('Patient')) $appointments = $user->patientAppointments()->accepted();
        if ($user->hasRole('Doctor')) $appointments = $user->doctorAppointments()->accepted();
        return view('pages.appointment.index' , [
            'page_title' => 'Appointments',
            'appointments' => $appointments->paginate(10),
            'alertData' => Session::get('alertData'),
            'archive' => false,
        ]);
    }

    /**
     * @return Application|RedirectResponse|Redirector|void
     */
    public function store(){
        $user = Auth::user();
        if ($user->hasRole('Admin')) return abortRequest();
        $today = Carbon::today();

        $schedule_id = request()->validate([
            'schedule_id' => ['required' , 'numeric' , 'exists:schedules,id']
        ])['schedule_id'];
        $schedule = Schedule::findOrFail($schedule_id);
        $patient_id = $user->hasRole('Patient') ? $user->id : request('patient_id');
        $doctor_id = $user->hasRole('Doctor') ? $user->id : request('doctor_id');

        $status = $user->hasRole('Doctor') ? 2 : 1;

        $patients = User::patients()->pluck('id')->all();
        $doctors = User::doctors()->pluck('id')->all();

        $alertData = alert('Fail' , 'Please Enter Valid Information' , 'error');
        if (!(in_array($patient_id , $patients) && in_array($doctor_id , $doctors)))
            return redirect()->back()->with($alertData);

        if (Carbon::today()->dayName == $schedule->day && substr($schedule->time , 1 , 4) > substr(now()->utcOffset(3*60)->format('g:i A') , 0 , 4)){
            $date = $today->toDateString();
        }else{
            $date = $today->next($schedule->day)->toDateString();
        }

        $data = ['doctor_id' => $doctor_id , 'schedule_id' => $schedule_id , 'date' => $date];
        $alertData = alert('Fail' , 'This Appointment Already Exist' , 'error');
        if (Appointment::where($data)->first() != null)
            return redirect()->back()->with($alertData);

        $data['status'] = $status;
        $data['patient_id'] = $patient_id;
        Appointment::create($data);
        $alertData = alert('Success' , 'Appointment Has Been Saved' , 'success');
        $route = $status == 2 ? route('appointment.index') : route('appointment.request');
        return redirect($route)->with($alertData);
    }

    /**
     * @return Application|Factory|View
     */
    public function requestAppointment()
    {
        if (request('user_id') != null)
            $user = User::findOrFail(request('user_id'));
        else
            $user = Auth::user();

        if ($user->hasRole('Admin')) return abortView();
        if ($user->hasRole('Patient')) $appointments = $user->patientAppointments()->requested();
        if ($user->hasRole('Doctor'))  $appointments = $user->doctorAppointments()->requested();
        return view('pages.appointment.index' , [
            'page_title' => 'Appointments',
            'appointments' => $appointments->paginate(10),
            'alertData' => Session::get('alertData'),
            'archive' => false,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function archive()
    {
        if (request('user_id') != null)
            $user = User::findOrFail(request('user_id'));
        else
            $user = Auth::user();

        if ($user->hasRole('Admin')) return abortView();
        if ($user->hasRole('Patient')) $appointments = $user->patientAppointments()->archive();
        if ($user->hasRole('Doctor'))  $appointments = $user->doctorAppointments()->archive();
        return view('pages.appointment.index' , [
            'page_title' => 'Archived Appointments',
            'appointments' => $appointments->paginate(10),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Appointment $appointment
     */
    public function changeStatus(Appointment $appointment){
        if (!Auth::user()->hasRole('Doctor')) return abortRequest();
        $appointment->update(['status' => request('status')]);
    }

    /**
     * @param Appointment $appointment
     */
    public function delete(Appointment $appointment){
        if (!Auth::user()->hasRole('Doctor')) return abortRequest();
        $appointment->delete();
    }

}
