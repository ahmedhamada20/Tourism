<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prelang;

class PrelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prelangs   =   Prelang::get();
        return view('admin.pre.index',compact('prelangs'));
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
        $prelang    =  new Prelang();
        $prelang->name  =   ['en'=>$request->name,'ar'=>$request->name_ar];
        $prelang->save();
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
        $prelang    =   Prelang::findorfail($id);
        return view('admin.pre.index',compact('prelang'));
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
        $prelang    =   Prelang::findorfail($id);
        $prelang->name  =   ['en'=>$request->name,'ar'=>$request->name_ar];
        $prelang->update();
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
        $prelang    =   Prelang::findorfail($id);
        $prelang->destroy($id);
        return redirect()->back();
    }
}
