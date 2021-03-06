@extends('layouts.app')

@section('title', 'Notifications')

@section('section')


<div class="mx-auto w-full bg-gray-100 p-6 mt-6 rounded-md dark:bg-gray-700">
  <div>
    @forelse($notifications as $notification)

    {{-- Like Notification --}}
    @if($notification->type === 'App\Notifications\LikeNotification')
    <div id="{{ $notification->id }}" class="bg-blue-200 dark:bg-gray-500 min-h-40 rounded-md shadow mb-3 p-4 text-gray-700 flex justify-between">
      <div>
        <a href="{{ route('profile.show', $notification->data['liker']['name']) }}" class="capitalize font-semibold text-blue-400 dark:text-gray-200">{{ str_replace('-', ' ',  $notification->data['liker']['name']) }}</a>

        <span class="dark:text-gray-300">
          liked
        </span>

        @if($notification->data['likeable_type'] === 'App\Models\Post')
        <a href="{{ $notification->data['url'] }}" class="font-semibold text-blue-400 dark:text-gray-200">your post</a>
        @elseif($notification->data['likeable_type'] === 'App\Models\Comment')
        <a href="{{ $notification->data['url'] }}" class="font-semibold text-blue-400 dark:text-gray-200">your comment</a>
        @endif


        <span class="dark:text-gray-300">
          {{ $notification->created_at->diffForHumans() }}
        </span>

      </div>

      <delete-notification id="{{ $notification->id }}"></delete-notification>
    </div>
    @endif

    {{-- Follow Notification --}}
    @if($notification->type === 'App\Notifications\FollowNotification')
    <div id="{{ $notification->id }}" class="bg-blue-200 dark:bg-gray-400 min-h-40 rounded-md shadow mb-3 p-4 flex justify-between">
      <div>
        <a href="{{ route('profile.show', $notification->data['follower']['name']) }}" class="capitalize font-semibold text-blue-400 dark:text-gray-200">{{ str_replace('-', ' ',  $notification->data['follower']['name']) }}</a>
        followed you {{ $notification->created_at->diffForHumans() }}
      </div>

      <delete-notification id="{{ $notification->id }}"></delete-notification>
    </div>
    @endif

    {{-- CommentCreated --}}
    @if($notification->type === 'App\Notifications\CommentCreated')
    <div id="{{ $notification->id }}" class="bg-blue-200 dark:bg-gray-400 min-h-40 rounded-md shadow mb-3 p-4 flex justify-between">
      <div>
        <a href="{{ route('profile.show', $notification->data['sender']['name']) }}" class="capitalize font-semibold text-blue-400 dark:text-gray-200">{{ str_replace('-', ' ',  $notification->data['sender']['name']) }}</a>
        made a comment on <a class="font-semibold text-blue-400 dark:text-gray-200" href="{{ $notification->data['url'] }}">your post</a>
        {{ $notification->created_at->diffForHumans() }}
      </div>
      <delete-notification id="{{ $notification->id }}"></delete-notification>
    </div>
    @endif

    @empty

    <h3 class="text-center dark:text-gray-200">No new notifications yet.</h3>

    @endforelse

  </div>

</div>

@endsection