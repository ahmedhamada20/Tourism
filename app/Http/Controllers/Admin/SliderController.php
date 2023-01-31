<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders    =   Slider::get();
        return view('admin.slider.index', compact('sliders'));
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
        $slider =   new Slider();
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/slider', $filename);
            $slider->image = $filename;
        }
        $slider->name   = [ 'ar' => $request->name , 'en' => $request->name_en];
        $slider->notes   = [ 'ar' => $request->notes , 'en' => $request->notes_en];
        $slider->save();
        toastr()->success('Done Created Successfully');
        return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider =   Slider::findorfail($id);
        return view('admin.slider.index', compact('slider'));
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
//        dd($request->all());
        $slider =   Slider::findorfail($id);
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/slider', $filename);
            $slider->image = $filename;
        }
        $slider->name   = [ 'ar' => $request->name , 'en' => $request->name_en];
        $slider->notes   = [ 'ar' => $request->notes , 'en' => $request->notes_en];
        $slider->update();
        toastr()->success('Done Created Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider =   Slider::findorfail($id);
        $slider->destroy($id);
        toastr()->error('Done Deleted Successfully');
        return redirect()->back();
    }
}
