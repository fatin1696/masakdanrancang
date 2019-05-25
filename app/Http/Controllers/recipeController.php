<?php

namespace App\Http\Controllers;
use App\recipe;
use Illuminate\Http\Request;
use App\category;

class recipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest()->paginate(5);

        return view('recipe.index', compact('recipes'))
       ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::latest()->paginate();

        return view('recipe.create', compact('categories'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new recipe;

        $recipe->recipename = $request->recipename;
        $recipe->category = $request->category;
        $recipe->preparetime = $request->preparetime;
        $recipe->serves = $request->serves;
        $recipe->pedas = $request->pedas;
        $recipe->directions = $request->directions;
        $recipe->ingredients = $request->ingredients;


        if ($request->hasFile('image')) {
            $recipe->image = $request->image->store('image', 'public');
        } else {
            $recipe->image = '';
        }

        

        $recipe->save();

        return redirect()->route('recipe.index')
        ->with('success','Berjaya Tambah Bahan Masakan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::latest()->paginate();
        return view('recipe.edit', compact('recipe','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->recipename = $request->recipename;
        $recipe->category = $request->category;
        $recipe->preparetime = $request->preparetime;
        $recipe->serves = $request->serves;
        $recipe->pedas = $request->pedas;
        $recipe->directions = $request->directions;
        $recipe->ingredients = $request->ingredients;
        
        
        $this->validate($request, [
            'recipename' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $recipe->image = $request->image->store('image', 'public');
        } else {
            $recipe->image = '';
        }

        $recipe->save();

        
        return redirect()->route('recipe.index') ->with('success','Berjaya Kemaskini Bahan Masakan !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('recipe.index') ->with('success','Berjaya Padam Resepi !!');
    }
}
