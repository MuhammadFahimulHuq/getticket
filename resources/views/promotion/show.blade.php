@extends('layouts.app')

@section('content')
<div class="flex flex-row justify-between mx-auto my-4 w-3/4">
<a href="/promotion" class="text-zinc-700 text-xl font-bold hover:text-zinc-600">Continue Shopping</a>
@if(Auth::check() && $user->role == "Admin" )
<div class="flex gap-4">
<a href="/promotion/{{$promotion->id}}/edit" class="underline text-zinc-700 text-md font-semibold hover:text-zinc-500">Edit Promotion</a>
<form action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
@csrf
@method('DELETE')
<button class="underline text-md font-semibold text-red-700 hover:text-red-500" type="submit" >Delete Promotion</button>
</form>
</div>
</div>
@endif
<div class="flex w-1/2 flex-col mx-auto my-7">
    <img class="rounded" src="{{asset('images/'.$promotion->image)}}" alt="">
<div class="flex flex-col justify-between px-2">
<h1 class="text-2xl font-extrabold capitalize">{{$promotion->title}}</h1>
<p class="text-md italic text-zinc-600">Description: {{$promotion->description}}</p>
<div class="flex justify-between my-4">
    <div>
<p class="text-2xl font-extrabold">Ticket Price:  <span>&#2547</span>{{$promotion->price}}</p>
<small class="text-sm">created at: {{$promotion->created_at}}</small>   
    </div>
    <div>
    <a class="inline-flex items-center py-2 px-5 text-sm font-medium font-bold text-center text-white bg-slate-700 rounded-sm hover:bg-slate-800 focus:ring-3 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-blue-slate dark:focus:ring-slate-800" href="/promotion/addtocart/{{$promotion->id}}">Add to cart
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
      </svg>
      </a>
    </div>
</div>



</div>
</div>

@endSection