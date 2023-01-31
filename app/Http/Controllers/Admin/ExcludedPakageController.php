<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Excluded;
use App\Models\Package;
use Illuminate\Http\Request;

class ExcludedPakageController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Excluded::create([
            'name' => ['ar' => $request->name, 'en' => $request->name_en],
            'packages_id' => $request->packages_id,
        ]);

        toastr()->success('Done Created  Successfully');
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
        $data = [
            'data' => Excluded::where('packages_id',decrypt($id))->get(),
            'Package' => Package::findOrfail(decrypt($id)),
        ];

        return view('admin.excludedPackage.index',$data);
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
        Excluded::findOrfail($request->id)->update([
            'name' => ['ar' => $request->name, 'en' => $request->name_en],
            'packages_id' => $request->packages_id,
        ]);

        toastr()->success('Done Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Excluded::destroy($request->id);
        
        toastr()->success('Done Deleted Successfully');
        return redirect()->back();
    }
}
