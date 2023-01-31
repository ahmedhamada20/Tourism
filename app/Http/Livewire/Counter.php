<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use App\Models\Setting;
use App\Models\Transfer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class Counter extends Component
{
    public $transfer;
    public array $quantity = [];
    public $buuton = false;

    public function mount(Transfer $transfer)
    {
        $this->transfer = $transfer;

        foreach ($this->transfer->extras as $row) {
            $this->quantity[$row->id] = 1;
        }
    }

    public function render()
    {
        $cartCart = Cart::content()->count();
        $cartTotal = Cart::subtotal();
        $cart = Cart::content();
        $setting    =   Setting::first();
        return view('livewire.counter', compact('setting', 'cart', 'cartCart', 'cartTotal'));
    }

    public function save($id)
    {

        $extra = Extra::findOrfail($id);
        \Gloudemans\Shoppingcart\Facades\Cart::add(
            $extra->id,
            $extra->name,
            $this->quantity[$id],
            $extra->price_person_en +1
        );
    }

    public function deleted($id)
    {
        $cart = Cart::content();
        $removeCart = $cart->where('id', $id)->first();
        Cart::remove($removeCart->rowId);

    }
}
