@extends('layouts.app')

@section('content')

<div class="flex gap-5">
<div class="w-1/2 bg-white">
<div class="text-xl">Order ID: #{{$order->id}}</div>
@foreach($order->orderItems as $promotion)
<div class="flex flex-row justify-between bg-white">
<img class="max-h-28 w-28 " src="{{asset('images/'.$promotion->image)}}" alt="{{$promotion->name}}.name">
<h1>{{$promotion->title}}</h1></a>

<p>{{$promotion->price}}</p>
<p>{{$promotion->quantity}}</p>    

<p>{{$promotion->quantity}}</p>

</div>
@endforeach
</div>
<div class="w-1/2 bg-white">
<p>Payment Method: {{$order->paymentMethod}}</p>
<p>Total Amount: {{$order->getAttribute('total-price')}}</p>
<p></p> 
</div>
</div>

@endSection