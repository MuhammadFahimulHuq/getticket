<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Cart::getContent();
        return view('carts.index')->with('promotions', $promotions);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $promotion =
            Promotion::find($id);
        Cart::add([
            'id' => $promotion->id,
            'name' =>   $promotion->title,
            'price' => $promotion->price,
            'weight' => 10,
            'quantity' => 1,
            'attributes' => array(
                'image' =>  $promotion->image,
                'description' => $promotion->description,
            )
        ]);
        return redirect(route('cart.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $promotion = Promotion::find($request->input('promotion_id'));
        // Cart::update(
        //     $promotion->id,
        //     [
        //         'quantity' => [
        //             'relative' => false,
        //             'value' => $request->input('promotion_quantity')
        //         ]
        //     ]
        // );
        // return redirect(route('cart.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $promotion = Promotion::find($request->input('promotion_id'));
        Cart::remove($promotion->id);
        return redirect(route('cart.index'));
    }
}
