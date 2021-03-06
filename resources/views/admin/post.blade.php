@extends('layouts.admin')

@section('content')

<div>
  <div class="flex justify-between items-center">
    <div>
      <h1 class="text-2xl dark:text-gray-300">Posts ({{ $posts->count() }})</h1>
    </div>
    <a href="{{ route('post.create') }}">
      <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md w-48">
        <span class="text-lg">+</span>
        <span class="ml-2">Start a New Topic</span>
      </div>
    </a>
  </div>

  <div style="height: .05rem;" class="bg-gray-400 mb-3"></div>

  <div class="grid lg:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 p-4 rounded-md shadow">
    <div>Title</div>
    <div>Views</div>
    <div>Comments</div>
    <div>Category</div>
    <div>
      <div class="md:flex justify-center">
        Actions
      </div>
    </div>
  </div>

  @forelse($posts as $post)
  <div class="grid lg:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 p-4 rounded-md shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
    <div>
      <h4>
        {{ \Illuminate\Support\Str::limit($post->title, 30) }}

      </h4>
    </div>

    <div class="flex">
      <span class="mr-3">
        {{ $post->views }}
      </span>

      <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg> -->
    </div>

    <div class="flex">
      <span class="mr-3 ml-5">
        {{ $post->comments_count }}
      </span>
      <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
      </svg> -->
    </div>

    <div>
      <change-category :categories="{{ App\Models\Category::all() }}" :category_id="{{ $post->category_id }}" :current_category="{{ App\Models\Category::find($post->category_id) }}" post_slug="{{ $post->slug }}"></change-category>


    </div>

    <div class="flex justify-around items-center">
      <make-latest post_slug="{{ $post->slug }}"></make-latest>

      <a href="{{ route('post.edit', $post->slug) }}">
        <svg id="delete" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </a>
    </div>

  </div>
  @empty
  @endforelse
</div>

{{ $posts->links() }}

@endsection