@extends('layouts.app')

@section('content')

<div class="flex flex-col justify-center items-center gap-5">
<div class="w-1/2">
<div class="text-2xl my-4">Order ID: #{{$order->id}}</div>
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Event Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Event Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Price 
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantity
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $promotion)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 <img class="max-h-28 w-28 " src="{{asset('images/'.$promotion->image)}}" alt="{{$promotion->name}}.name">
                </th>
                <td class="py-4 px-6">
                    {{$promotion->title}}
                </td>
                <td class="py-4 px-6">
                    <span>&#2547</span>{{$promotion->price}}
                </td>
                <td class="py-4 px-6">
                    {{$promotion->quantity}}
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>
</div>
</div>
<div class="w-1/2 bg-white text-xl">
    <p class="font-bold">Information Details</p>
    <p>Contact No: {{$order->getAttribute('contact-no')}}</p>
<p>Payment Method: {{$order->paymentMethod}}</p>
<p>Total Amount: <span>&#2547</span>{{$order->getAttribute('total-price')}}</p>
<p></p> 
</div>
</div>

@endSection