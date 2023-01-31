<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currencies;
use App\Models\Setting;
use App\Models\Transfer;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SerachController extends Controller
{
    public function trips(Request $request)
    {
        $data = [
            'trips' => Trips::where('destination_id', $request->destination_id)
                ->orWhere('name', 'LIKE', '%' . $request->name . '%')
                ->paginate(50),
            'setting' => Setting::first(),
            'blos' => Blog::take(2)->get(),
            'footer_trips' => Trips::latest()->take(5)->get(),
            'curanncys'  =>   Currencies::get(),
        ];

       

        if ($data) {
            return view('front.search-tours', $data);
        } else {
            return back()->with('error', 'No Result For This Search');
        }
    }


    public function TransferSearch(Request $request)
    {
        

        try {
            $data = [
                'transfers' => Transfer::where('destenation_id', $request->destenation_id_row)
                    // ->orWhere('route_to', $request->route_to)
                    // ->orWhere('start_date', $request->start_date)
                    ->get(),
                'setting' => Setting::first(),
                'blos' => Blog::take(2)->get(),
                'footer_trips' => Trips::latest()->take(5)->get(),
                'curanncys'  =>   Currencies::get(),
            ];
          
            
            if ($data) {
                return view('front.search-transfer', $data);
            } else {
                return back()->with('error', 'No Result For This Search');
            }
        } catch (\Exception $exception) {
            return redirect()->back('No Result For This Search');
        }
    }

    public function route_form($id)
    {
        return Transfer::where('destenation_id', $id)->pluck('route_form', 'id');
    }

    public function route_to($id)
    {
        return Transfer::where('destenation_id', $id)->pluck('route_to', 'id');
    }
}
