<?php

namespace App\Http\Controllers;
use App\manage;
use App\recipe;
use App\ingredient;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jadualperancanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $manages = Manage::latest()->paginate(5);


       return view('jadualperancangan.index', compact('manages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $recipes = Recipe::latest()->paginate();

        return view('jadualperancangan.create', compact('recipes'))
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
        $user = Auth::user();
        $search = $user->id;

        $manage= new Manage();

        $manage->recipename=$request->get('recipename');
        $manage->mealtime=$request->get('mealtime');
        $manage->tarikh=$request->get('tarikh');
        $manage->user_id = $search;
        $manage->save();
        return redirect()->route('jadualperancangan.show')
        ->with('success','Berjaya Membuat Perancangan Masakan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $manages = Manage::latest()->paginate(5);
        $user = Auth::user();
        
        $search = $user->id;
        $manages = DB::table('manages')->where('user_id', 'like', '%' .$search.'%')->paginate(5);

        return view('jadualperancangan.index', compact('manages'))
       ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function showrecipe(Request $request,$id)
    {
        $manage = Manage::find($id);

        $searchrecipe = $manage->recipename;
        $recipes = DB::table('recipes')->where('recipename', 'like', '%' .$searchrecipe.'%')->paginate(5);
        
        $manage->save();
    
        return view('jadualperancangan.showrecipe',compact('recipes'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manage = Manage::find($id);
        return view('jadualperancangan.edit',compact('manage'));
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
        $manage = Manage::find($id);
        $manage->recipename=$request->get('recipename');
        $manage->mealtime=$request->get('mealtime');
        $manage->tarikh=$request->get('tarikh');
        $manage->save();
        return redirect()->route('jadualperancangan.index')
        ->with('success','Berjaya Kemaskini Perancangan Masakan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manage = Manage::find($id);
        $manage->delete();
        return redirect()->route('jadualperancangan.show') ->with('success','Berjaya Padam Perancangan Masakan !!');
    }
}
