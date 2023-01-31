<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\CallToAction;
use App\Models\Currencies;
use App\Models\Destenation;
use App\Models\OurParten;
use App\Models\Package;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Transfer;
use App\Models\Trips;
use App\Models\Why;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'destinations' => Destenation::take(6)->get(),
            'calls' => CallToAction::take(3)->get(),
            'about' => AboutUs::first(),
            'blogs' => Blog::take(4)->get(),
            'trips' => Trips::take(6)->get(),
            'trip_1' => Trips::take(1)->first(),
            'blog_1' => Blog::take(1)->first(),
            'packages' => Package::take(3)->get(),
            'setting' => Setting::first(),
            'footer_trips' => Trips::latest()->take(5)->get(),
            'transfers' => Transfer::inRandomOrder()->take(1)->get(),
            'sliders' => Slider::get(),
            'partners' => OurParten::get(),
            'reviews' => Review::get(),
            'whys' => Why::get(),
            'blos' => Blog::take(4)->get(),
            'curanncys' => Currencies::get(),
        ];
        return view('front.index', $data);
    }

    public function change_curacy(Request $request)
    {
        Session::put('curacy', $request->curanncy_id);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Invoice()
    {
        $data = [
            'setting' => Setting::first(),
            'footer_trips' => Trips::latest()->take(5)->get(),
            'blos' => Blog::take(2)->get(),
            'curanncys' => Currencies::get(),
        ];
        return view('front.invoice', $data);
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
        //
    }

    public function GitTrips($id)
    {
        $trip = Trips::findorfail($id);
        $trips = Trips::paginate(3);
        $setting = Setting::first();
        $footer_trips = Trips::latest()->take(5)->get();
        $curanncys  =   Currencies::get();
        return view('front.details.trip-details', compact('trip', 'trips', 'setting', 'footer_trips','curanncys'));
    }

    public function GitPackage($id)
    {
        $cart = Cart::content();
        $package = Package::findorfail(decrypt($id));
        $packages = Package::paginate(3);
        $setting = Setting::first();
        $footer_trips = Trips::latest()->take(5)->get();
        $blos = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        $sliders  =   Package::get();
        $destinations   =   Destenation::take(3)->get();
        return view('front.package.details', compact('destinations','sliders','cart','blos', 'package', 'packages', 'setting', 'footer_trips','curanncys'));
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
