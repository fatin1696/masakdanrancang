<?php

namespace App\Http\Controllers;
use App\senarairesepi;
use App\recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class senarairesepiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::latest()->paginate(5);

        return view('senarairesepi.index', compact('recipes'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $recipes = DB::table('recipes')->where('recipename', 'like', '%' .$search.'%')
                                       ->orWhere('serves', 'like', '%' .$search. '%')->paginate(5);
        return view('senarairesepi.index', compact('recipes'))
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
        return view('senarairesepi.show',compact('recipe'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
