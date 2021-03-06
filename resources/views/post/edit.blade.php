@extends('layouts.app')

@section('title', 'edit your post')

@section('section')
<div class="mx-auto w-full bg-gray-100 p-6 mt-5 rounded-md dark:bg-gray-700 dark:text-gray-300">


  <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data" class="py-3" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <h1 class="text-2xl font-base text-center">Update Post</h1>

    <div class="mt-10 md:w-9/12 mx-auto">
      <input type="text" 
      name="title" placeholder="Title here..."  
      class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-600 dark:text-gray-300" 
      value="{{ $post->title }}">
      @error('title')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
      @enderror

    </div>


    <div class="md:w-9/12 mx-auto mt-10">
      <select name="category_id" 
      class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-600 dark:text-gray-300">
      <option value="">Select a category</option>
      @forelse($categories as $category)
      <option @if($post->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
      @empty
      <option>No Category</option>
      @endforelse
    </select>
    @error('category_id')
    <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror

  </div>

  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="desc" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300">{{ $post->desc }}</textarea>
    @error('desc')
    <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror
  </div>

  {{-- Filepond --}}
  <div class="md:w-9/12 mx-auto mt-10">
    <input 
    type="file" 
    id="photo" 
    name="images[]"
    accept="image/*" 
    multiple
    data-allow-reorder="true"
    data-max-file-size="3MB"
    data-max-files="3" class="w-full"
    >
  </div>

  <div class="mt-8 md:w-9/12 mx-auto">
    <input type="submit" value="Update Post" class="px-3 py-2 bg-gray-700 dark:bg-gray-800 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

<Images :images="{{ $files }}"></Images>
</div>
@endsection
