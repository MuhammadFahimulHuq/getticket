<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions =  Promotion::orderBy('created_at', 'desc')->paginate(5);
        $topPromotions = Promotion::orderBy('created_at', 'desc')->limit(3)->get();
        return view('promotion.index')->with('promotions', $promotions)->with('topPromotions', $topPromotions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $promotion = new Promotion;
        $promotion->title = $request->input('title');
        $promotion->description = $request->input('description');
        $promotion->price = $request->input('price');
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $promotion->image = $imageName;
        $promotion->save();
        return redirect('/promotion')->with('success', 'Promotion Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);
        return view('promotion.show')->with('promotion', $promotion)->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('promotion.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $promotion = Promotion::find($id);
        $promotion->title = $request->input('title');
        $promotion->description = $request->input('description');
        $promotion->price = $request->input('price');
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $promotion->image = $imageName;
        $promotion->save();
        return redirect('/promotion')->with('success', 'Promotion Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        if ($promotion->image) {
            @unlink(public_path('images', $promotion->image));
        }
        $promotion->delete();
        return redirect('/promotion')->with('success', 'Promotion Removed!');
    }
}
