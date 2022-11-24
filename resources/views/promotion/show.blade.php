@extends('layouts.app')

@section('content')
<a href="/promotion" class="text-blue-700">Go Back</a>
<h1>Promotion Title: {{$promotion->title}}</h1></a>
<img src="{{asset('images/'.$promotion->image)}}" alt="">
<p>Description : {{$promotion->description}}</p>
<p>Ticket Price: {{$promotion->price}}</p>
<small>created at: {{$promotion->created_at}}</small>   
<a class="text-sky-800 text-lg underline" href="">add to cart</a> 
@if(Auth::check())
@if($user->role == "Admin" )
<a href="/promotion/{{$promotion->id}}/edit">Edit</a>
<form action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" style="background: red">Delete</button>
</form>
@endif
@endif
@endSection