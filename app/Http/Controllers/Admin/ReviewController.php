<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews    =   Review::get();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review =   new Review();
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/review', $filename);
            $review->image = $filename;
        }
        $review->name =$request->name;
        $review->link   =$request->link;
        $review->save();
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
        $review =   Review::findorfail($id);
        return view('admin.review.edit',compact('review'));
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
        $review =   Review::findorfail($id);
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/review', $filename);
            $review->image = $filename;
        }
        $review->name =$request->name;
        $review->link   =$request->link;
        $review->update();
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
        $review =   Review::findorfail($id);
        $review->destroy($id);
        toastr()->success('Done Created Successfully');
        return redirect()->back();
    }
}
