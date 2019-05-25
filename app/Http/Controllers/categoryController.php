<?php

namespace App\Http\Controllers;
use App\category;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(5);

        return view('category.index', compact('categories'))
       ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = new category;

        $category->categoryname = $request->categoryname;
        $category->description = $request->description;
        $category->viewer=0;

        if ($request->hasFile('image')) {
            $category->image = $request->image->store('images', 'public');
        } else {
            $category->image = '';
        }


        $category->save();

        return redirect()->route('category.index')->with('success','Berjaya Tambah Kategori Masakan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
        
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
        $category = Category::findOrFail($id);
        $category->categoryname = $request->categoryname;
        $category->description = $request->description;
        $category->viewer = $category->viewer;
        
        
        $this->validate($request, [
            'categoryname' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $category->image = $request->image->store('image', 'public');
        } else {
            $category->image = '';
        }

        $category->save();        
        return redirect()->route('category.index') ->with('success','Berjaya Kemaskini Kategori Masakan!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index') ->with('success','Berjaya Padam Kategori !!');
    }
}
