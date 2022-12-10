@extends('layouts.app')

@section('content')


@if(count($promotions)>0)

     <div class="flex flex-row gap-x-4 max-md:flex-col gap-y-4">
@foreach ($promotions as $promotion)
<x-promotion-card :promotion="$promotion"/>
@endforeach
    </div>
{{$promotions->links()}}

@else
<p>No Post Found</p>
@endif
@endSection



