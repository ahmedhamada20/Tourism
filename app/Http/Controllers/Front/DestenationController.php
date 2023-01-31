<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currencies;
use App\Models\Destenation;
use App\Models\Setting;
use App\Models\Trips;
use Illuminate\Http\Request;

class DestenationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
              $destin =   Destenation::findorfail(decrypt($id));
        $trips = Trips::paginate(20);
        $setting = Setting::first();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.destination', compact('trips', 'setting', 'footer_trips', 'blos','curanncys','destin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = [
            "trips" => Trips::where('destination_id', decrypt($id))->get(),
            "setting" => Setting::first(),
            "footer_trips" => Trips::latest()->take(5)->get(),
            "blos" => Blog::take(2)->get(),
            'destination' => Destenation::findorfail(decrypt($id)),
        ];

        return view('front.destination.details', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
