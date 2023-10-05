<?php

namespace App\Http\Controllers;

use App\Mail\MedicalMail;
use App\Models\Category;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function viewRequests(){
        if(!Auth::user()->hasRole('Admin')) return abortView();
        $registrations = $this->requestSearch();
        $registrations = $registrations != null ?
            $registrations->registration()->paginate(10):
            Registration::registration()->paginate(10);
        return view('pages.request.index' , [
            'page_title' => 'Registrations',
            'registrations' => $registrations,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Registration $request
     * @return Application|Factory|\never|View
     */
    public function viewRequest(Registration $request){
        if(!Auth::user()->hasRole('Admin')) return abortView();
        if ($request->status != 0) return abort(404);
        return view('pages.request.view' , [
            'page_title' => 'Registrations',
            'registration' => $request,
            'categories' => Category::all(),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function viewRequestsArchive(){
        if(!Auth::user()->hasRole('Admin')) return abortView();
        $registrations = $this->requestSearch();
        $registrations = $registrations != null ?
            $registrations->archived()->paginate(10):
            Registration::archived()->paginate(10);
        return view('pages.request.index' , [
            'page_title' => 'Archived Registrations',
            'registrations' => $registrations,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Registration $registration
     */
    public function register(Registration $registration)
    {
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        $category = @request()->validate([
            'category' => ['exists:categories,id']
        ])['category'];
        $status = request('status');
        $type = request('type');
        $phone = request('phone');
        $address = request('address');
        $registration->status = $status;
        $registration->save();
        $mail = $registration->email;
        if ($status == 1){
            $user = User::create([
                'name' => $registration->name,
                'account_id' => generateID(),
                'email' => $registration->email,
                'password' => $registration->password,
                'phone' => $phone,
                'address' => $address,
            ]);
            if ($type == 1)
                $user->assignRole('Doctor');
            $user->update(['category_id' => $category]);
            if ($type == 2){
                $user->assignRole('Patient');
            }
        }
        $registration->email = 'Transferred';
        $registration->phone = 'Transferred';
        $registration->save();
        $body = $status == 1 ? 'Your Request Has Been Approved, Welcome To Medical Center, Sign In Now: https://iug-dental-clinic.com .. Your Account ID: '.$user->account_id :
            'Your Request Has Been Canceled, Please Check That You Enter Valid Information';
        $details = [
            'title' => 'Mail Form DentalClinic',
            'body' => $body,
        ];
        Mail::to($mail)->send(new MedicalMail($details));
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        if ($user->id != Auth::user()->id) return abortView();
        return view('pages.user.edit' , [
            'page_title' => 'Edit User',
            'user' => $user,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(User $user){
        if ($user->id != Auth::user()->id) abortRequest();
        $data = request()->validate([
            'name' => ['required' , 'string', 'max:40'],
            'email' => ['required' , 'string', 'email', 'max:40', 'unique:registrations' ,'unique:users,email,'.($user != null ? $user->id :'')],
            'address' => ['required', 'string', 'max:100'],
            'phone' => ['required' , 'numeric' , 'digits:10' , 'unique:registrations' ,'unique:users,phone,'.($user != null ? $user->id :'')],
            'about' => ['nullable' , 'string' , 'max:1000']
        ]);
        if (request('password'))
            $data['password'] = bcrypt(\request()->validate(['password' => ['required' , 'string', 'min:8' , 'max:8', 'confirmed']])['password']);
        $user->update($data);
        $alertData = alert('Success' , 'User Has Been Updated' , 'success');
        return redirect(route('user.edit' , $user->id))->with($alertData);
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function editCategory(User $user){
        if(!Auth::user()->hasRole('Admin')) return abortView();
        if(!$user->hasRole('Doctor')) return abortView();
        return view('pages.user.editCategory' , [
            'page_title' => 'Edit Doctor Category',
            'user' => $user,
            'alertData' => Session::get('alertData'),
            'categories' => Category::all()
        ]);
    }

    /**
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function changeCategory(User $user){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        if(!$user->hasRole('Doctor')) abortRequest();
        $category = request()->validate([
            'category_id' => ['exists:categories,id']
        ])['category_id'];
        $user->update(['category_id' => $category]);
        $alertData = alert('Success' , 'Category Has Been Changed Successfully' , 'success');
        return redirect(route('doctor.index'))->with($alertData);
    }

    /**
     * @return Application|Factory|View
     */
    public function indexDoctors()
    {
        $doctors = $this->userSearch();
        $doctors = $doctors != null ? $doctors->doctors()->paginate(10) : User::doctors()->paginate(10);
        return view('pages.user.index' , [
            'page_title' => 'Doctors',
            'users' => $doctors,
            'categories' => Category::all(),
            'alertData' => Session::get('alertData'),
            'category' => null,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function indexPatients()
    {
        if(Auth::user()->hasRole('Patient')) return abortView();
        $patients = $this->userSearch();
        $patients = $patients != null ? $patients->patients()->paginate(10) : User::patients()->paginate(10);
        return view('pages.user.index' , [
            'page_title' => 'Patients',
            'users' => $patients,
            'alertData' => Session::get('alertData'),
            'category' => null
        ]);
    }

    /**
     * @param Registration $request
     */
    public function deleteRequest(Registration $request){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        $request->delete();
    }

    /**
     * @param User $user
     */
    public function deleteUser(User $user){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        $user->delete();
    }

    /**
     * @return null
     */
    private function userSearch(){
        $users = null;
        request()->validate(['search' => ['nullable' , 'string' , 'max:20'], 'category' => ['nullable' , 'max:4']]);
        if (request('search') != null)
            $users = User::where('name', 'like', '%' . request('search') . '%')
            ->orWhere('account_id', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('phone', 'like', '%' . request('search') . '%')
            ->orWhere('address', 'like', '%' . request('search') . '%');
        if (request('category') != null)
            $users = $users != null ? $users->orWhere('category_id' ,'=', request('category')) : User::where('category_id' ,'=', request('category'));
        return $users;
    }

    /**
     * @return null
     */
    private function requestSearch(){
        $registrations = null;
        request()->validate(['search' => ['nullable' , 'string' , 'max:20'], 'type' => ['nullable' , 'max:4'], 'status' => ['nullable' , 'max:4']]);
        if (request('search') != null)
            $registrations = Registration::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' .request('search') . '%')
                ->orWhere('phone', 'like', '%' .request('search') . '%')
                ->orWhere('address', 'like', '%' .request('search') . '%')
                ->orWhere('created_at', 'like', '%' .request('search') . '%');
        if (request('type') != null)
            $registrations = $registrations != null ? $registrations->orWhere('type' ,'=', request('type')) : Registration::where('type' ,'=', request('type'));
        if (request('status') != null)
            $registrations = $registrations != null ? $registrations->orWhere('status' ,'=', request('status')) : Registration::where('status' ,'=', request('status'));
        return $registrations;
    }
}
