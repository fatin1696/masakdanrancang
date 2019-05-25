<?php

namespace App\Http\Controllers;
use App\category;
use App\senarairesepi;
use App\recipe;
use App\home;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::latest()->paginate();

        $sliders = Slider::all();


        return view('home', compact('categories', 'sliders'));
    }

    public function show(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->viewer = $category->viewer + 1;

        $search = $category->categoryname;
        $recipes = DB::table('recipes')->where('category', 'like', '%' .$search.'%')->paginate(5);
        
        $category->save();
        
        return view('home.show', compact('recipes'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    

}
