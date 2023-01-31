<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currencies;
use App\Models\Setting;
use App\Models\Trips;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $setting = Setting::first();
        $footer_trips=Trips::latest()->take(5)->get();
        $blos  = Blog::take(2)->get();
        $curanncys  =   Currencies::get();
        return view('auth.register', compact('setting','footer_trips','curanncys','blos'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'countries_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => trans('app.required'),
            'name.string' => trans('app.string'),
            'name.max' => trans('app.max'),
            'countries_id.required' => trans('app.required'),
            'email.required' => trans('app.required'),
            'email.email' => trans('app.email'),
            'email.max' => trans('app.max'),
            'email.unique' => trans('app.unique'),
            'password.required' => trans('app.required'),
            'password.confirmed' => trans('app.confirmed'),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'countries_id' => $request->countries_id,
            'type' => "customer",
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
