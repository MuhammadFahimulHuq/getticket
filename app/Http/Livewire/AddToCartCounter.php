<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCartCounter extends Component
{
    public function render()
    {
        $count =  Cart::getContent()->count();
        return view('livewire.add-to-cart-counter')->with('count', $count);
    }
}
