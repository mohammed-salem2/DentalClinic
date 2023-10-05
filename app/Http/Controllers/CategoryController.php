<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        if(!Auth::user()->hasRole('Admin')) return abortView();
        return view('pages.category.create' , [
            'page_title' => 'Create Category',
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store(){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        Category::create(request()->validate([
            'name' => ['required' , 'string' , 'max:20', 'unique:categories,name']
        ]));
        $alertData = alert('Success' , 'Category Has Benn Added' , 'success');
        return redirect(route('category.index'))->with($alertData);
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        request()->validate(['search' => ['nullable' , 'string' , 'max:20']]);
        if (request()->has('search'))
            $categories = Category::where('name', 'like', '%' . request('search') . '%')->paginate(10);

        return view('pages.category.index' , [
            'page_title' => 'Index Categories',
            'categories' => $categories ?? Category::paginate(10),
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function doctors(Category $category){
        return view('pages.user.index' , [
            'page_title' => $category->name.' Category\'s '.' Doctors',
            'users' =>  $category->doctors()->paginate(10),
            'alertData' => Session::get('alertData'),
            'category' => $category
        ]);
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        if(!Auth::user()->hasRole('Admin')) return abortView();
        return view('pages.category.edit' , [
            'page_title' => 'Edit Category',
            'category' => $category,
            'alertData' => Session::get('alertData')
        ]);
    }

    /**
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Category $category){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        $category->update(request()->validate([
            'name' => ['string' , 'max:20', 'unique:categories,name,'.($category != null ? $category->id :'')]
        ]));
        $alertData = alert('Success' , 'Category Has Been Updated' , 'success');
        return redirect(route('category.index'))->with($alertData);
    }

    /**
     * @param Category $category
     */
    public function delete(Category $category){
        if(!Auth::user()->hasRole('Admin')) abortRequest();
        $category->delete();
    }
}
