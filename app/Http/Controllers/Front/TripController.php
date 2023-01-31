<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currencies;
use App\Models\Destenation;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Transfer;
use App\Models\Trips;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trips::with('photos')->paginate(20);
        $setting = Setting::first();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.tour', compact('trips', 'setting', 'footer_trips', 'blos', 'curanncys'));
    }
    public function details($id)
    {
        // \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        $cart = Cart::content();
        $trip = Trips::findorfail(decrypt($id));
        $sliders  =   Trips::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.tours-details', compact('cart', 'trip', 'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function tours_check($id)
    {
        $cart = Cart::content();
        $trip = Trips::findorfail(decrypt($id));
        $sliders  =   Trips::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.tours-info', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function transfer_check($id)
    {
        $cart = Cart::content();
        $trip = Transfer::findorfail(decrypt($id));
        $sliders  =   Transfer::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Transfer::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.Transfer.info', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function package_check($id)
    {
        $cart = Cart::content();
        $trip = Package::findorfail(decrypt($id));
        $sliders  =   Package::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Package::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.package.package-info', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function tours_cart($id)
    {
        $cart = Cart::content();

        $trip = Trips::findorfail(decrypt($id));
        $sliders  =   Trips::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.tours-cart', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function transfer_cart($id)
    {

        $cart = Cart::content();

        $trip = Transfer::findorfail(decrypt($id));
        $sliders  =   Transfer::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Transfer::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.Transfer.index', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
    }

    public function toursuser_package_cartcart($id)
    {
        $cart = Cart::content();

        $trip = Package::findorfail(decrypt($id));
        $sliders  =   Package::get();
        $setting = Setting::first();
        $destinations   =   Destenation::take(3)->get();
        $footer_trips = Package::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('front.package.package-info', compact('trip', 'cart',  'setting', 'footer_trips', 'blos', 'destinations', 'curanncys', 'sliders'));
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
        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        $cart = Cart::content();
        $trips = Trips::findorfail(decrypt($id));
        $setting = Setting::first();
        $blos = Blog::take(2)->get();
        $footer_trips = Trips::latest()->take(5)->get();
        $curanncys  =   Currencies::get();
        return view('front.trips-form-wizard', compact('curanncys', 'trips', 'setting', 'cart', 'blos', 'footer_trips'));
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
