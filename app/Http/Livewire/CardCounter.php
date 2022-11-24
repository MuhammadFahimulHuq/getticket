<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardCounter extends Component
{


    public function mount()
    {
    }
    public function render()
    {
        $promotions_unsorted = Cart::getContent();
        $promotions = $promotions_unsorted->sortBy('id');
        return view('livewire.card-counter')->with('promotions', $promotions);
    }
    public function removeCart($id)
    {
        $promotion = Promotion::find($id);
        Cart::remove($promotion->id);
    }
    public function incrementQty($id)
    {
        $cart_promotion = Cart::get($id);
        Cart::update(
            $cart_promotion->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $cart_promotion->quantity++,
                ]
            ]
        );
    }
    public function decrementQty($id)
    {

        $cart_promotion = Cart::get($id);
        Cart::update(
            $cart_promotion->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $cart_promotion->quantity--,
                ]
            ]
        );
    }
}
