<?php


use App\Models\Destenation;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\File;

if (!function_exists('uploadPhoto')) {
    function uploadPhoto($request, $nameFile, $folderImage, $id_photo, $model)
    {
        if ($file = $request->file($nameFile)) {
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $request->file($nameFile)->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;

            if ($file->move('admin/pictures/' . $folderImage . '/' . $id_photo, $file_to_store)) {
                Photo::create([
                    'Filename' => $file_to_store,
                    'photoable_id' => $id_photo,
                    'photoable_type' => $model,
                ]);
            }
        }
    }
}

if (!function_exists('updatePhoto')) {
    function updatePhoto($request, $nameFile, $folderImage, $id_photo, $model, $oldfile)
    {
        if ($file = $request->file($nameFile)) {
            File::delete(public_path('admin/pictures/' . $folderImage . '/' . $request->id . '/' . $oldfile));
            $file_name = $file->getClientOriginalName();
            $file_name_Extension = $request->file($nameFile)->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $file_name)[0] . '_.' . $file_name_Extension;
            if ($file->move('admin/pictures/' . $folderImage . '/' . $id_photo, $file_to_store)) {
                Photo::updateOrCreate([
                    'photoable_id' => $request->id,
                    'photoable_type' => $model,
                ], [
                    'Filename' => $file_to_store,
                    'photoable_id' => $id_photo,
                    'photoable_type' => $model,
                ]);
            }
        }
    }
}

if (!function_exists('getTranslation')) {
    function getTranslation($name, $lan)
    {
        $getTranslation = getTranslation($name, $lan);
        return $getTranslation;
    }
}

if (!function_exists('getphotosTransfer')) {
    function getphotosTransfer($id)
    {
        $photos = Photo::where('photoable_type', 'App\Models\Transfer')->where('photoable_id', $id)->get();
        return $photos;
    }
}
if (!function_exists('getphotosTrips')) {
    function getphotosTrips($id)
    {
        $photos = Photo::where('photoable_type', 'App\Models\Trips')->where('photoable_id', $id)->get();
        return $photos;
    }
}

if (!function_exists('getphotosPackage')) {
    function getphotosPackage($id)
    {
        $photos = Photo::where('photoable_type', 'App\Models\Package')->where('photoable_id', $id)->get();
        return $photos;
    }
}
if (!function_exists('getTotalPrice')) {
    function getTotalPrice($id)
    {
        $getTotalPrice = \App\Models\Cart::where('user_id', $id)->sum('total');
        return $getTotalPrice;
    }
}

if (!function_exists('getActiveRoutesHome')) {
    function getActiveRoutesHome($route)
    {
        $actives = request()->routeIs($route) ? ' active' : null;
        return $actives;
    }
}


if (!function_exists('getUserTypeAdmin')) {
    function getUserTypeAdmin()
    {
        return User::where('type', 'admin')->get();
    }
}

if (!function_exists('getCountTrips')) {
    function getCountTrips($id)
    {
        $decs = Destenation::findorfail($id);
        $count = 0;
        foreach ($decs->trips as $row) {
            $count += $row->count('destination_id');
        }
        return $count;
    }
}
if (!function_exists('getCountPrice')) {
    function getCountPrice()
    {
        $count = 0;

        foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $row) {
            $count = $row->qty * $row->price;
        }
        return $count;
    }
}
if (!function_exists('getTotalOrdersPending')) {
    function getTotalOrdersPending($id)
    {
        $totalOrder = \App\Models\Order::where('user_id', $id)->where('status', 'pending')->sum('total');
        return $totalOrder;
    }
}
if (!function_exists('getTotalOrdersConfirmed')) {
    function getTotalOrdersConfirmed($id)
    {
        $totalOrder = \App\Models\Order::where('user_id', $id)->where('status', 'confirmed')->sum('total');
        return $totalOrder;
    }
}
if (!function_exists('getTotalOrders')) {
    function getTotalOrders($id)
    {
        $totalOrder = \App\Models\Order::where('user_id', $id)->sum('total');
        return $totalOrder;
    }
}
if (!function_exists('getPriceInCuracy')) {
    function getPriceInCuracy($price)
    {
//       return \Illuminate\Support\Facades\Session::get('curacy');
        if (\Illuminate\Support\Facades\Session::get('curacy')) {
            $row = \App\Models\Currencies::findorfail(\Illuminate\Support\Facades\Session::get('curacy'));
            return $row->rate * $price;
        } else {
            return $price;
        }
    }
}

