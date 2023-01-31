<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Extra;
use App\Models\Currencies;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Transfer;
use App\Models\Trips;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{


    public function cart(Request $request)
    {
        $cart =  \Gloudemans\Shoppingcart\Facades\Cart::content();



        $extra = Extra::findOrfail($request->extra_id);
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $extra->id,
            $extra->name,
            $request->quantity,
            $extra->price_person_en
        );

        return redirect()->back();
    }

    public function carttransfer(Request $request)
    {
        $cart =  \Gloudemans\Shoppingcart\Facades\Cart::content();


        $extra = Extra::findOrfail($request->extra_id);
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $extra->id,
            $extra->name,
            $request->quantity,
            $extra->price_person_en
        );

        return redirect()->back();
    }

    // public function cartpackage(Request $request)
    // {
    //   $cart =  \Gloudemans\Shoppingcart\Facades\Cart::content();


    //     $extra = Package::findOrfail($request->extra_id);
    //     \Gloudemans\Shoppingcart\Facades\Cart::add(
    //         $extra->id,
    //         $extra->name,
    //         $request->quantity,
    //         $extra->price
    //     );

    //     return redirect()->back();
    // }

    public function cartDeleted()
    {
        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
        return redirect()->back();
    }

    public function deletedCart($id)
    {
        $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $rowId = $cart->where('id', $id)->first();
        \Gloudemans\Shoppingcart\Facades\Cart::remove($rowId->rowId);
        return redirect()->back();
    }

    public function index()
    {
        $data = [
            'data' => Cart::where('user_id', Auth::user()->id)->get(),
            'setting' => Setting::first(),
            'footer_trips' => Trips::latest()->take(5)->get(),
            'curanncys'  =>   Currencies::get(),
        ];
        return view('front.cart.cart', $data);
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

        try {
            $setting = Setting::first();
            $blos = Blog::take(2)->get();
            $curanncys  =   Currencies::get();
            $footer_trips = Trips::latest()->take(5)->get();

            if ($request->transferOrderRequest == 3) {

                $transfers = Transfer::findorfail($request->transfer_id);
                if (auth()->user()) {

                    $this->validate($request, [
                        'user_airline' => 'required',
                        'user_date' => 'required',
                        'user_time' => 'required',

                    ], [
                        'user_airline.required' => 'the user airline is required',
                        'user_date.required' => 'the user number is required',
                        'user_time.required' => 'the user form is required',

                    ]);

                    if (auth()->user()->countries_id == 173) {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->transfer_id = $request->transfer_id;
                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $transfers->price_EG_go;
                        $newCart_admin->save();
                    } else {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->transfer_id = $request->transfer_id;
                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $transfers->price_EN_go;
                        $newCart_admin->save();
                    }


                    return view('front.invoices.invoice_admin', compact('newCart_admin', 'setting', 'blos', 'footer_trips', 'curanncys'));
                } else {

                    $this->validate($request, [
                        'name_user' => 'required',
                        'name_email' => 'required',
                        'name_phone' => 'required',
                        'user_airline' => 'required',
                        'user_date' => 'required',
                        'user_time' => 'required',

                    ], [
                        'name_user.required' => 'the user airline is required',
                        'name_email.required' => 'the user number is required',
                        'name_phone.required' => 'the user form is required',
                        'user_airline.required' => 'the user point is required',
                        'user_date.required' => 'the user notes is required',
                        'user_time.required' => 'the user notes is required',

                    ]);


                    $newCart_cutsmer = new Cart();
                    $newCart_cutsmer->user_airline = $request->user_airline;
                    $newCart_cutsmer->user_date = $request->user_date;
                    $newCart_cutsmer->user_time = $request->user_time;
                    $newCart_cutsmer->user_number = $request->user_number;
                    $newCart_cutsmer->user_form = $request->user_form;
                    $newCart_cutsmer->user_point = $request->user_point;
                    $newCart_cutsmer->user_notes = $request->user_notes;
                    $newCart_cutsmer->name_user = $request->name_user;
                    $newCart_cutsmer->name_email = $request->name_email;
                    $newCart_cutsmer->transfer_id = $request->transfer_id;
                    $newCart_cutsmer->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $transfers->price_EN_go;
                    $newCart_cutsmer->save();

                    return view('front.invoices.invoice_custmer', compact('newCart_cutsmer', 'setting', 'blos', 'footer_trips', 'curanncys'));
                }
            } elseif ($request->tripsOrderRequest == 8) {
                $trips = Trips::findorfail($request->trips_id);

                if (auth()->user()) {

                    $this->validate($request, [
                        'user_airline' => 'required',
                    ], [
                        'user_airline.required' => 'the user notes is required',
                    ]);

                    if (auth()->user()->countries_id == 173) {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->trip_id = $request->trips_id;

                        $newCart_admin->adulte = $request->adulte;
                        $newCart_admin->chiled = $request->chiled;
                        $newCart_admin->date = $request->date;
                        $newCart_admin->time = $request->time;

                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $trips->price_adult_EG + ($request->adulte * $trips->price_adult_EG) + ($request->chiled * $trips->price_child_EG);
                        $newCart_admin->save();
                    } else {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->trip_id = $request->trips_id;
                        $newCart_admin->adulte = $request->adulte;
                        $newCart_admin->chiled = $request->chiled;
                        $newCart_admin->date = $request->date;
                        $newCart_admin->time = $request->time;
                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $trips->price_adult_EN + ($request->adulte * $trips->price_adult_EN) + ($request->chiled * $trips->price_child_EN);
                        $newCart_admin->save();
                    }


                    return view('front.invoices_trips.invoice_admin', compact('newCart_admin', 'setting', 'blos', 'footer_trips', 'curanncys'));
                } else {

                    $this->validate($request, [
                        'name_user' => 'required',
                        'name_email' => 'required',
                        'name_phone' => 'required',
                        'user_airline' => 'required',
                    ], [
                        'name_user.required' => 'the user airline is required',
                        'name_email.required' => 'the user number is required',
                        'name_phone.required' => 'the user form is required',
                        'user_airline.required' => 'the user point is required',
                    ]);


                    $newCart_cutsmer = new Cart();
                    $newCart_cutsmer->user_airline = $request->user_airline;
                    $newCart_cutsmer->user_number = $request->user_number;
                    $newCart_cutsmer->user_form = $request->user_form;
                    $newCart_cutsmer->user_point = $request->user_point;
                    $newCart_cutsmer->user_notes = $request->user_notes;
                    $newCart_cutsmer->name_user = $request->name_user;
                    $newCart_cutsmer->name_email = $request->name_email;
                    $newCart_cutsmer->trip_id = $request->trips_id;
                    $newCart_cutsmer->adulte = $request->adulte;
                    $newCart_cutsmer->chiled = $request->chiled;
                    $newCart_cutsmer->date = $request->date;
                    $newCart_cutsmer->time = $request->time;
                    $newCart_cutsmer->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $trips->price_adult_EN + ($request->adulte * $trips->price_adult_EN) + ($request->chiled * $trips->price_child_EN);
                    $newCart_cutsmer->save();

                    return view('front.invoices_trips.invoice_custmer', compact('newCart_cutsmer', 'setting', 'blos', 'footer_trips', 'curanncys'));
                }
            } else {
                $package = Package::findorfail($request->package_id);
                if (auth()->user()) {

                    $this->validate($request, [
                        'user_airline' => 'required',
                    ], [
                        'user_airline.required' => 'the user notes is required',
                    ]);

                    if (auth()->user()->countries_id == 173) {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->package_id = $request->package_id;

                        $newCart_admin->adulte = $request->adulte;
                        $newCart_admin->chiled = $request->chiled;
                        $newCart_admin->date = $request->date;
                        $newCart_admin->time = $request->time;


                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $package->price + ($request->adulte * $package->price_adult_EG) + ($request->chiled  * $package->price_child_EG);
                        $newCart_admin->save();
                    } else {
                        $newCart_admin = new Cart();
                        $newCart_admin->user_airline = $request->user_airline;
                        $newCart_admin->user_number = $request->user_number;
                        $newCart_admin->user_form = $request->user_form;
                        $newCart_admin->user_point = $request->user_point;
                        $newCart_admin->user_notes = $request->user_notes;
                        $newCart_admin->name_user = $request->name_user;
                        $newCart_admin->name_email = $request->name_email;
                        $newCart_admin->package_id = $request->package_id;
                        $newCart_admin->adulte = $request->adulte;
                        $newCart_admin->chiled = $request->chiled;
                        $newCart_admin->date = $request->date;
                        $newCart_admin->time = $request->time;
                        $newCart_admin->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $package->price + ($request->adulte * $package->price_adult_EN) + ($request->chiled  * $package->price_child_EN);
                        $newCart_admin->save();
                    }


                    return view('front.invoices_pacakge.invoice_admin', compact('newCart_admin', 'setting', 'blos', 'footer_trips', 'curanncys'));
                } else {

                    $this->validate($request, [
                        'name_user' => 'required',
                        'name_email' => 'required',
                        'name_phone' => 'required',
                        'user_airline' => 'required',
                    ], [
                        'name_user.required' => 'the user airline is required',
                        'name_email.required' => 'the user number is required',
                        'name_phone.required' => 'the user form is required',
                        'user_airline.required' => 'the user point is required',
                    ]);


                    $newCart_cutsmer = new Cart();
                    $newCart_cutsmer->user_airline = $request->user_airline;
                    $newCart_cutsmer->user_number = $request->user_number;
                    $newCart_cutsmer->user_form = $request->user_form;
                    $newCart_cutsmer->user_point = $request->user_point;
                    $newCart_cutsmer->user_notes = $request->user_notes;
                    $newCart_cutsmer->name_user = $request->name_user;
                    $newCart_cutsmer->name_email = $request->name_email;
                    $newCart_cutsmer->package_id = $request->package_id;
                    $newCart_cutsmer->adulte = $request->adulte;
                    $newCart_cutsmer->chiled = $request->chiled;
                    $newCart_cutsmer->date = $request->date;
                    $newCart_cutsmer->time = $request->time;
                    $newCart_cutsmer->total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $package->price + ($request->adulte * $package->price_adult_EN) + ($request->chiled  * $package->price_child_EN);
                    $newCart_cutsmer->save();

                    return view('front.invoices_pacakge.invoice_custmer', compact('newCart_cutsmer', 'setting', 'blos', 'footer_trips', 'curanncys'));
                }
            }
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors(['error' => __('app.error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Cart::where('user_id', Auth::user()->id)->get();
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
        $cart = Cart::findorfail($id);
        $cart->destroy($id);
        return redirect()->back()->with('error', 'Deleted Successfully');
    }
}
