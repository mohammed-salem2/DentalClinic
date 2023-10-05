<?php

use \Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Models\User;
use \Illuminate\Support\Facades\Auth;

function alert($title , $message , $type): array{
    return [
        'alertData' => [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]
    ];
}
function handleImages($request = null , $fileName = null): Request
{
    $files = [];
    if($request === null)
        $request = \request();
    foreach($request->files as $name => $file) {
        $file = $request->file($name);
        $extension = $file->extension();
        $url = $name.Carbon::now()->format('YmdHisu') .'.'. $extension;
        $user = Auth::user();
        $username = str_replace(' ', '', $user->name);
        $file->storeAs('storage/'.($fileName ?? $username), $url);
        $files[$name] = asset(Storage::url(($fileName ?? $username).'/'.$url));
    }
    $request = new Request($request->all());
    return $request->merge($files);
}
function generateID(){
    $now = Carbon::now();
    $account_id = User::whereYear('created_at', '=', $now->year)->whereMonth('created_at', '=', $now->month)->pluck('account_id')->max();
    return $account_id != null ? $account_id + 1 : $now->year.$now->month.'0001';
}
function abortView(){
    return view('layout.404' , ['page_title' => 'Page Not Found']);
}
function abortRequest(){
    abort(403 , 'You Are Not Authorized');
}
