<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TreatmentController extends Controller
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
        if ($user->hasRole('Doctor'))  $treatments = $user->doctorTreatments()->paginate(10);
        if ($user->hasRole('Patient')) $treatments = $user->patientTreatments()->paginate(10);
        return view('pages.treatment.index' , [
            'page_title' => 'Index Treatment',
            'alertData' => Session::get('alertData'),
            'treatments' => $treatments,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        if (!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.treatment.create' , [
            'page_title' => 'Create Treatment',
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
        Treatment::create($data);
        $alertData = alert('Success' , 'Treatment Has Been Added Successfully' , 'success');
        return redirect(route('treatment.index'))->with($alertData);
    }

    /**
     * @param Treatment $treatment
     * @return Application|Factory|View
     */
    public function edit(Treatment $treatment)
    {
        if (!Auth::user()->hasRole('Doctor')) return abortView();
        return view('pages.treatment.edit' , [
            'page_title' => 'Edit Treatment',
            'alertData' => Session::get('alertData'),
            'treatment' => $treatment,
            'patients' => User::patients()->get()
        ]);
    }

    /**
     * @param Treatment $treatment
     * @return Application|RedirectResponse|Redirector|void
     */
    public function update(Treatment $treatment)
    {
        if (!Auth::user()->hasRole('Doctor')) return abortRequest();
        $treatment->update($this->getData());
        $alertData = alert('Success' , 'Treatment Has Been Updated Successfully' , 'success');
        return redirect(route('treatment.index'))->with($alertData);
    }

    /**
     * @param Treatment $treatment
     */
    public function delete(Treatment $treatment){
        if(!Auth::user()->hasRole('Doctor')) return abortRequest();
        $treatment->delete();
    }

    /**
     * @return array
     */
    private function getData(): array
    {
         return request()->validate([
            'medicine' => ['required' , 'string' , 'max:40'],
            'details' => ['required' , 'string' , 'max:1000'],
            'date' => ['required' , 'string' , 'max:20'],
            'patient_id' => ['required' , 'numeric' , 'exists:users,id'],
        ]);
    }
}
