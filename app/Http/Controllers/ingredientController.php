<?php

namespace App\Http\Controllers;
use App\ingredient;

use Illuminate\Http\Request;

class ingredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::latest()->paginate(5);

        return view('ingredient.index', compact('ingredients'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $ingredient = new ingredient;

        $ingredient->ingredientname = $request->ingredientname;
        
        if ($request->hasFile('image')) {
            $ingredient->image = $request->image->store('image', 'public');
        } else {
            $ingredient->image = '';
        }

        $ingredient->save();

        return redirect()->route('ingredient.index')
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
        //
        $ingredient = Ingredient::find($id);
        return view('ingredient.show',compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredient.edit', compact('ingredient'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
       
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
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->ingredientname = $request->ingredientname;
        
        
        $this->validate($request, [
            'ingredientname' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $ingredient->image = $request->image->store('image', 'public');
        } else {
            $ingredient->image = '';
        }

        $ingredient->save();

        
        return redirect()->route('ingredient.index') ->with('success','Berjaya Kemaskini Bahan Masakan !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('ingredient.index') ->with('success','Berjaya Padam Bahan Masakan !!');

    }
}
