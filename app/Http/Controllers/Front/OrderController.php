<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Countries;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderPaid;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $detlies_cart = Cart::findorfail($request->cart_id);

        if (auth()->user()) {
            $new = new Order();
            $new->user_id = Auth::user()->id;
            $new->trip_id = $detlies_cart->trip_id;
            $new->package_id = $detlies_cart->package_id;
            $new->transfer_id = $detlies_cart->transfer_id;
            $new->total = $detlies_cart->total;
            $new->nationalty = Auth::user()->countries_id == 173 ? 'مصري' : 'اجنبي';
            $new->status = "pending";
            $new->save();
            $data = [
                'total' => $detlies_cart->total,
                'title' => "طلب جديد",
            ];
            // Mail::to(Auth::user()->email)->send(new OrderShipped($data));
            // Mail::to(getUserTypeAdmin())->send(new OrderShipped($data));
            Cart::destroy($request->cart_id);
            \Gloudemans\Shoppingcart\Facades\Cart::destroy();
            return redirect(RouteServiceProvider::HOME);
        } else {

            $user = new User();
            $user->name = $detlies_cart->name_user;
            $user->email = $detlies_cart->name_email;
            $user->phone = $detlies_cart->name_phone;
            $user->countries_id = Countries::all()->random()->id;
            $user->password = Hash::make($detlies_cart->name_phone);
            $user->type = "customer";
            $user->save();


            $new = new Order();
            $new->user_id = $user->id;
            $new->trip_id = $detlies_cart->trip_id;
            $new->package_id = $detlies_cart->package_id;
            $new->transfer_id = $detlies_cart->transfer_id;
            $new->total = $detlies_cart->total;
            $new->nationalty = $user->countries_id == 173 ? 'مصري' : 'اجنبي';
            $new->status = "pending";
            $new->save();

            $data = [
                'total' => $detlies_cart->total,
                'title' => "طلب جديد",
            ];
            // Mail::to($user->email)->send(new OrderShipped($data));
            // Mail::to(getUserTypeAdmin())->send(new OrderShipped($data));

            Cart::destroy($request->cart_id);
            \Gloudemans\Shoppingcart\Facades\Cart::destroy();

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
//            Mail::to($user->email)->send(new OrderShipped($data));
//            Mail::to(getUserTypeAdmin())->send(new OrderShipped($data));
        }


//        $carts = Cart::where('user_id', Auth::user()->id)->get();
//
//        foreach ($carts as $cart) {
//            $order = new Order();
//            $order->user_id = Auth::user()->id;
//            $order->trip_id = $cart->trip_id;
//            $order->package_id = $cart->package_id;
//            $order->transfer_id = $cart->transfer_id;
//            $order->date_id = $cart->date_id;
//            $order->nationalty = Auth::user()->countries_id == 173 ? 'مصري' : 'اجنبي';
//            $order->adult_price = $cart->adult_price;
//            $order->child_price = $cart->child_price;
//            $order->total = $cart->total;
//            $order->adult_number = $cart->adult_number;
//            $order->child_number = $cart->child_number;
//            $order->status = "pending";
//            $order->save();
//
//
//            $data = [
//                'total' => $cart->total,
//                'title' => "طلب جديد",
//            ];
//            Mail::to(Auth::user()->email)->send(new OrderShipped($data));
//            Mail::to(getUserTypeAdmin())->send(new OrderShipped($data));


//        Cart::where('user_id', Auth::user()->id)->delete();
//        return redirect()->route('user_dashboard')->withMessage('Done Order', 'Done Order');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
