<?php

namespace App\Http\Controllers;

use App\Mail\MedicalMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMail()
    {
        $details = [
            'title' => 'Mail Form DentalClinic',
            'body' => request('body'),
        ];
        Mail::to(request('mail'))->send(new MedicalMail($details));
    }
}
