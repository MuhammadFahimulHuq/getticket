@extends('layouts.app')

@section('content')
@if ($orders->count()>0)
<p class="text-xl">{{Auth::user()->name}}'s your orderslist</p>
<div class="overflow-x-auto relative shadow-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Order ID
                </th> 
                <th scope="col" class="py-3 px-6">
                Purchase Date
                </th>
                <th scope="col" class="py-3 px-6">
                Total Amount
                </th>
                <th scope="col" class="py-3 px-6">
                    Payment Type
                    </th>
                    <th scope="col" class="py-3 px-6">
                       Order Summary
                        </th>
            </tr>
        </thead>
@foreach ($orders as $order)
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$order->id}}
                </th>
                <td class="py-4 px-6">
                    {{$order->created_at}}
                  </td>
                <td class="py-4 px-6">
                    {{$order->getAttribute('total-price')}}
                </td>
                <td class="py-4 px-6">
                    {{$order->getAttribute('paymentMethod')}}
                </td>
                <td class="py-4 px-6">
                    <a href="/profile/orderdetails/{{$order->id}}" class="text-white bold-md">View Details</a>
                </td>
                
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@else
<p>Your Order is empty!</p>  
@endif

@endSection