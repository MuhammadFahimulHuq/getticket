@extends('layout.app')

@section('content')
<a href="/promotion">Go Back</a>
<h1>Promotion Title: {{$promotion->title}}</h1></a>
<img src="{{asset('images/'.$promotion->image)}}" alt="">
<p>Description : {{$promotion->description}}</p>
<p>Ticket Price: {{$promotion->price}}</p>
<small>created at: {{$promotion->created_at}}</small>    

<a href="/promotion/{{$promotion->id}}/edit">Edit</a>
<form action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" style="background: red">Delete</button>
</form>
@endSection