<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DiagnoseController extends Controller
{
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
        if ($user->hasRole('Doctor'))  $diagnoses = $user->doctorDiagnoses()->paginate(10);
        if ($user->hasRole('Patient')) $diagnoses = $user->patientDiagnoses()->paginate(10);
        return view('pages.diagnose.index' , [
            'page_title' => 'Index Diagnose',
            'alertData' => Session::get('alertData'),
            'diagnoses' => $diagnoses,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        if (!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.diagnose.create' , [
            'page_title' => 'Create Diagnose',
            'alertData' => Session::get('alertData'),
            'patients' => User::patients()->get()
        ]);
    }

    /**
     * @return Application|RedirectResponse|Redirector|void
     */
    public function store()
    {
        $user = Auth::user();
        if (!$user->hasRole('Doctor')) return abortRequest();
        $data = $this->getData();
        $data['doctor_id'] = $user->id;
        Diagnose::create($data);
        $alertData = alert('Success' , 'Diagnose Has Been Added Successfully' , 'success');
        return redirect(route('diagnose.index'))->with($alertData);
    }

    /**
     * @param Diagnose $diagnose
     * @return Application|Factory|View
     */
    public function edit(Diagnose $diagnose)
    {
        if (!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.diagnose.edit' , [
            'page_title' => 'Edit Diagnose',
            'alertData' => Session::get('alertData'),
            'diagnose' => $diagnose,
            'patients' => User::patients()->get()
        ]);
    }

    /**
     * @param Diagnose $diagnose
     * @return Application|RedirectResponse|Redirector|void
     */
    public function update(Diagnose $diagnose)
    {
        if (!Auth::user()->hasRole('Doctor')) return abortRequest();
        $diagnose->update($this->getData());
        $alertData = alert('Success' , 'Diagnose Has Been Updated Successfully' , 'success');
        return redirect(route('diagnose.index'))->with($alertData);
    }

    /**
     * @param Diagnose $diagnose
     */
    public function delete(Diagnose $diagnose){
        if(!Auth::user()->hasRole('Doctor')) return abortRequest();
        $diagnose->delete();
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        return request()->validate([
            'diagnose' => ['required' , 'string' , 'max:40'],
            'details' => ['required' , 'string' , 'max:1000'],
            'date' => ['required' , 'string' , 'max:20'],
            'patient_id' => ['required' , 'numeric' , 'exists:users,id'],
        ]);
    }}
