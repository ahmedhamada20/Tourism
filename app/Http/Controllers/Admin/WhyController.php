<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whys    =   Why::get();
        return view('admin.why.index', compact('whys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $why =   new Why();
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/why', $filename);
            $why->image = $filename;
        }
        $why->name =$request->name;
        $why->disc   =$request->disc;
        $why->save();
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
        $why =   Why::findorfail($id);
        return view('admin.why.edit',compact('why'));
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
        $why =   Why::findorfail($id);
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/why', $filename);
            $why->image = $filename;
        }
        $why->name =$request->name;
        $why->disc   =$request->disc;
        $why->update();
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
        $why =   Why::findorfail($id);
        $why->destroy($id);
        toastr()->success('Done Created Successfully');
        return redirect()->back();
    }
}
