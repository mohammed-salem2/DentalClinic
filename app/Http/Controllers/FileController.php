<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{
    public function store(){
        if(!Auth::user()->hasRole('Patient')) abortRequest();
        request()->validate([
            'file' => ['required', 'max:3000', 'mimes:doc,docx,mp4,mov,ogg,pdf,jpeg,jpg'],
        ]);
        $file = handleImages(request())->file;
        File::create(['file' => $file , 'user_id' => Auth::user()->id]);
        $alertData = alert('Success' , 'File Has Been Uploaded Successfully' , 'success');
        return redirect()->back()->with($alertData);
    }

    public function create()
    {
        if(!Auth::user()->hasRole('Patient')) return abortView();
        return view('pages.file.create' , [
            'page_title' => 'Upload File',
            'alertData' => Session::get('alertData')
        ]);
    }
}
