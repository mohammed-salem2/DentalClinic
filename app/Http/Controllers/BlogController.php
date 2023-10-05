<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        return view('pages.blog.index' , [
            'page_title' => 'Index Blog',
            'blogs' => Blog::paginate(10),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function view(Blog $blog){
        return view('pages.blog.view' , [
            'page_title' => $blog->title,
            'blog' => $blog,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog){
        if (Auth::user()->hasRole('Patient')) return abortView();
        return view('pages.blog.edit' , [
            'page_title' => 'Edit '.$blog->title,
            'blog' => $blog,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(){
        if (Auth::user()->hasRole('Patient')) return abortView();
        return view('pages.blog.create' , [
            'page_title' => 'Create Blog',
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Blog $blog
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Blog $blog){
        if (Auth::user()->hasRole('Patient')) abortRequest();
        $data = request()->validate([
            'logo' => ['nullable', 'max:3000', 'mimes:png,jpeg,jpg'],
            'title' => ['nullable' , 'string'],
            'subject' => ['nullable' , 'string'],
        ]);
        if (request()->has('logo'))
            $data['logo'] = handleImages(request() , 'blog')->logo;
        $blog->update($data);
        $alertData = alert('Success' , 'Blog Has Been Updated' , 'success');
        return redirect(route('blog.index'))->with($alertData);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store(){
        if (Auth::user()->hasRole('Patient')) abortRequest();
        $data = request()->validate([
            'logo' => ['required', 'max:3000', 'mimes:png,jpeg,jpg'],
            'title' => ['required' , 'string'],
            'subject' => ['required' , 'string'],
        ]);
        $data['logo'] = handleImages(request() , 'blog')->logo;
        Blog::create($data);
        $alertData = alert('Success' , 'Blog Has Been Created' , 'success');
        return redirect(route('blog.index'))->with($alertData);
    }

    /**
     * @param Blog $blog
     */
    public function delete(Blog $blog){
        if (Auth::user()->hasRole('Patient')) abortRequest();
        $blog->delete();
    }
}
