@extends('layouts.app')

@section('section')
<div class="w-full mx-auto mt-5 bg-gray-100 p-6">
<div>
  
  <form action="{{ route('category.store') }}" method="POST" 
  enctype="multipart/form-data"
  class="py-3" enctype="multipart/form-data">
  @csrf

  <h1 class="text-lg md:text-2xl font-base text-center">Create Category</h1>

  <div class="mt-10 md:w-9/12 mx-auto">
    <input type="text" 
    name="name" placeholder="Name here..." class="w-full rounded-md focus:ring-0 focus:border-purple-500" 
    value="{{ old('name') }}">
    @error('name')
    <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror

  </div>


  <div class="mt-8 md:w-9/12 mx-auto">
    <input type="submit" value="Create Category" class="px-3 py-3 bg-gray-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

</div>

</div>
<br>
<br>
<br>
@endsection
