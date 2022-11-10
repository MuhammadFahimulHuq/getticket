@extends('layouts.app')

@section('content')
<h1>Create Promotion</h1>
<form action="{{route('promotion.update',$promotion->id)}}" method="POST" enctype="multipart/form-data">
 @method('PUT')
    @csrf
<label for="title">Title</label>
<input type="text" id="title" name="title" class="form-control" value="{{$promotion->title}}" >
<label for="description">Description</label>
<input type="text" id="description" name="description" class="form-control" value="{{$promotion->description}}">
<label for="price">Price</label>
<input type="number" name="price" id="price" value="{{$promotion->price}}">
<label for="image">Upload Image</label>
<input type="file" class="form-control" id="image" name="image" value="{{$promotion->image}}">
<button type="submit">Submit</button>
</form>
@endSection