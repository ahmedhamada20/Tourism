<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currencies;
use App\Models\Setting;
use App\Models\Transfer;
use App\Models\Trips;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::get();
        $setting = Setting::first();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.transfer', compact('transfers', 'setting', 'footer_trips', 'blos','curanncys'));
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
        $cart = Cart::content();
        $sliders  =   Transfer::get();
        $sliders_trans  =   Transfer::inRandomOrder()->take(2)->get();
        $transfer = Transfer::findorfail(decrypt($id));
        $setting = Setting::first();
        $blos = Blog::take(2)->get();
        $footer_trips = Trips::latest()->take(5)->get();
        $curanncys  =   Currencies::get();
        return view('front.Transfer.detlis', compact('sliders_trans','sliders','curanncys','transfer', 'setting', 'cart', 'blos', 'footer_trips'));
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
