<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Trips extends Component
{

    public $trips;
    public array $quantity = [];
    public $buuton = false;

    public function mount(\App\Models\Trips $trips)
    {
        $this->trips = $trips;

        foreach ($this->trips->extras as $row) {
            $this->quantity[$row->id] = 1;
        }
    }

    public function render()
    {
        $cartCart = Cart::content()->count();
        $cartTotal = Cart::subtotal();
        $cart = Cart::content();
        $setting    =   Setting::first();
        return view('livewire.trips', compact('setting', 'cart', 'cartCart', 'cartTotal'));
    }

    public function save($id)
    {

        $extra = Extra::findOrfail($id);
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $extra->id,
            $extra->name,
            $this->quantity[$id],
            $extra->price_person_en
        );
    }

    public function deleted($id)
    {
        $cart = Cart::content();
        $removeCart = $cart->where('id', $id)->first();
        Cart::remove($removeCart->rowId);

    }

}
