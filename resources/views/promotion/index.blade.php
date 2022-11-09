@extends('layout.app')

@section('content')

@if(count($promotions)>0)
@foreach ($promotions as $promotion)
<h1>Promotion Title: </h1> <a href="/promotion/{{$promotion->id}}"><h1>{{$promotion->title}}</h1></a>
<p>Description : {{$promotion->description}}</p>
<p>Ticket Price: {{$promotion->price}}</p>
<small>created at: {{$promotion->created_at}}</small>    
@endforeach

@else
<p>No Post Found</p>
@endif
@endSection