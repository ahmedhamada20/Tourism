<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder($id)
    {
        $order = Order::where('status', $id)->orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('order'));
    }

    public function getAllOrder()
    {
        $order = Order::orderBy('id', 'DESC')->get();
        return view('admin.order.getAll', compact('order'));
    }

    public function change_status(Request $request)
    {
        Order::findorfail($request->id)->update([
            'status' => $request->status,
        ]);
        toastr()->success('Done Change Status Successfully');
        return redirect()->back();
    }

    public function deleted_status(Request $request)
    {
        Order::destroy($request->id);
        toastr()->success('Done Deleted Order Successfully');
        return redirect()->back();
    }
}

