<?php

namespace App\Http\Controllers;
use App\grocerylist;
use App\ingredient;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class grocerylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $grocerylists = Grocerylist::latest()->paginate(5);

        return view('grocerylist.index', compact('grocerylists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::latest()->paginate();

        return view('grocerylist.create', compact('ingredients'))
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

        $grocerylist = new Grocerylist();

        $grocerylist->ingredientname=$request->get('ingredientname');
        $grocerylist->quantity=$request->get('quantity');
        $grocerylist->tarikh=$request->get('tarikh');
        $grocerylist->user_id = $search;
        $grocerylist->save();
        return redirect()->route('grocerylist.show')
        ->with('success','Berjaya Membuat Senarai Beli !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $grocerylists = Grocerylist::latest()->paginate(5);
        $user = Auth::user();
        
        $search = $user->id;
        $grocerylists = DB::table('grocerylists')->where('user_id', 'like', '%' .$search.'%')->paginate(5);

        return view('grocerylist.index', compact('grocerylists'))
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
        $grocerylist = Grocerylist::find($id);
        return view('grocerylist.edit',compact('grocerylist'));
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
        $grocerylist = Grocerylist::find($id);
        $grocerylist->delete();
        return redirect()->route('grocerylist.show') ->with('success','Berjaya Padam Senarai Beli !!');
    }
}
