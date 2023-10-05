<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class AdviceController extends Controller
{

    /**
     * AdviceController constructor.
     */
    public function __construct() {
        $this->middleware('role:Doctor');
    }

    /**
     * @return Application|Factory|View
     */
    public function create(){
        return view('pages.advice.create' , [
            'page_title' => 'Create Advice',
        ]);
    }

    /**
     * @return Application|Redirector|RedirectResponse
     */
    public function store()
    {
        Advice::create(request()->validate(['advice' => ['required' , 'string' , 'max:1000']]));
        $alertData = alert('Successful' , 'Advice Has Been Created Successfully' , 'success');
        return redirect(route('advice.index'))->with($alertData);
    }

    /**
     * @param Advice $advice
     * @return Application|Factory|View
     */
    public function edit(Advice $advice)
    {
        return view('pages.advice.edit',[
            'page_title' => 'Edit Advice',
            'advice' => $advice
        ]);
    }

    /**
     * @param Advice $advice
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Advice $advice){
        $advice->update(request()->validate([
            'advice' => ['required' , 'string' , 'max:1000']
        ]));
        $alertData = alert('Successful' , 'Advice Has Been Updated Successfully' , 'success');
        return redirect(route('advice.index'))->with($alertData);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pages.advice.index' , [
            'page_title' => 'Advices',
            'advices' => Advice::paginate(10),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Advice $advice
     */
    public function delete(Advice $advice)
    {
        $advice->delete();
    }
}
