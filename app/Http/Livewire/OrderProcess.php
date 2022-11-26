<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class OrderProcess extends Component
{
    public $currentStep = 1;
    public $contactInfo, $paymentInfo;
    public function render()
    {
        return view('livewire.order-process');
    }
    public function addContactInfo()
    {
        $validatedData =  $this->validate(['contactInfo' => 'required']);
        $this->currentStep = 2;
    }
    public function addPaymentMethod()
    {
        $validatedData = $this->validate(['paymentInfo' => 'required']);
    }
    public function submitForm()
    {

        $data = ([
            'contact-no' => $this->contactInfo,
            'paymentMethod' => $this->paymentInfo,
            'total-price' => Cart::getTotal(),
        ]);
        $data["user_id"] = auth()->id();
        $order = Order::create($data);

        $promotions = Cart::getContent();
        foreach ($promotions as $promotion) {
            $orderItems_data[] = ([
                'title' => $promotion->name,
                'description' => $promotion->attributes->description,
                'price' => $promotion->price,
                'quantity' => $promotion->quantity,
                'image' => $promotion->attributes->image,
                'order_id' => $order->id
            ]);
        };
        foreach ($orderItems_data as $orderItems) {
            OrderItems::create($orderItems);
        }

        Cart::clear();
        redirect(route('promotion.index'));
    }
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
