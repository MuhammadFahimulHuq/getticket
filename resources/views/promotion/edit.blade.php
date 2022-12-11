@extends('layouts.app')

@section('content')

<form action="{{route('promotion.update',$promotion->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
<div class="m-auto w-1/2">
  <h1 class="text-2xl bold-extrabold text-center my-4">Edit Promotion</h1>
  <div>
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Title</label>
        <input type="text" name="title" id="title" value="{{$promotion->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>
      <div class="mb-6">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ticket Price</label>
        <input type="number" name="price" id="price" value="{{$promotion->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type Ticket Price" required>
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
      </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
        <textarea  name="description" id="description"  class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$promotion->description}}</textarea>
      </div>
      <div class="mb-6">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Image</label>
        <input type="file" name="image" value="{{$promotion->image}}" id="image" class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
      </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button></div>
</div>
</form>
@endSection