<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\slider;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);

        return view('slider.index', compact('sliders'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new slider;

        $slider->descriptions = $request->descriptions;
        
        if ($request->hasFile('image')) {
            $slider->image = $request->image->store('image', 'public');
        } else {
            $slider->image = '';
        }

        $slider->save();

        return redirect()->route('slider.index')
        ->with('success','Berjaya Tambah Slider Baharu !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        return view('slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('slider.edit', compact('slider'))
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
        $slider = Slider::findOrFail($id);
        $slider->descriptions = $request->descriptions;
        
        
        $this->validate($request, [
            'descriptions' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $slider->image = $request->image->store('image', 'public');
        } else {
            $slider->image = '';
        }

        $slider->save();

        
        return redirect()->route('islider.index') ->with('success','Berjaya Kemaskini Slider !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider.index') ->with('success','Berjaya Padam Slider!!');
    }
}
