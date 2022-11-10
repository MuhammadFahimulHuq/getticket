@extends('layouts.app')

@section('content')
<h1>Create Promotion</h1>
<form action="{{route('promotion.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<label for="title">Title</label>
<input type="text" id="title" name="title" class="form-control" placeholder="Write Title">
<label for="description">Description</label>
<input type="text" id="description" name="description" class="form-control">
<label for="price">Price</label>
<input type="number" name="price" id="price">
<input type="file" class="form-control" name="image">
<button type="submit">Submit</button>
</form>
@endSection