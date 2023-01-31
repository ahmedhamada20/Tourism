<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => User::where('type', 'admin')->get(),
        ];
        return view('admin.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new User();
        $new->name = $request->name;
        $new->email = $request->email;
        $new->countries_id = $request->countries_id;
        $new->password = Hash::make($request->password);
        $new->type = "admin";
        $new->save();
        toastr()->success('Done Create Admin Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = User::findorfail($request->id);
        $new->name = $request->name ?? $new->name;
        $new->email = $request->email ?? $new->email;
        $new->countries_id = $request->countries_id ?? $new->countries_id;
        $new->password = Hash::make($request->password) ?? $new->password;
        $new->type = "admin";
        $new->save();
        toastr()->success('Done Edit Admin Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::destroy($request->id);
        toastr()->success('Done Deleted Admin Successfully');
        return redirect()->back();
    }
}
