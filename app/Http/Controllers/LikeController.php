<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StorelikesRequest;
use App\Http\Requests\UpdatelikesRequest;
use App\Notifications\LikeNotification;

class LikeController extends Controller
{
	public function likeData()
	{
		$like = Like::whereUserId(auth()->id())
		->whereLikeableId(request()->likeable_id)
		->whereLikeableType(request()->likeable_type)
		->exists();

		$count = Like::whereLikeableId(request()->likeable_id)
		->whereLikeableType(request()->likeable_type)
		->count();

		$liked = $like ? 'liked' : 'notLiked';
		return [$liked, $count];
	}


	public function like()
	{
		if ($this->liked()) {
			return "Item already liked by this user";
		}

		auth()
		->user()
		->likes()
		->create([
			'likeable_id' => request()->likeable_id,
			'likeable_type' => request()->likeable_type,
			'like' => 'like'
		]);

    $likeable = \App\Models\Like::whereLikeableId(request()->likeable_id)->whereLikeableType(request()->likeable_type)->get()[0];
		$user = \App\Models\User::findOrFail(request()->user_id);

    // Event Logic
    event(new \App\Events\LikeEvent($likeable));


    // Notification Logic
    $url = request()->url;

    if (request()->likeable_type == 'App\Models\Post') {
      $url = request()->url;
    } elseif (request()->likeable_type == 'App\Models\Comment') {
      $url = request()->url . '#comment-' . request()->likeable_id;
    }


    if (
// $user->id !== auth()->id() &&
     $user->setting->like_notifiable
   ) {
     $user->notify(new LikeNotification(
      request()->likeable_id, 
      request()->likeable_type,
      $likeable,
      $url,
    ));
   }

   return "Item liked successfully";
 }

 public function deleteLike()
 {
  if (! $this->liked()) {
   return 'Like does not exist!';
 }

 auth()
 ->user()
 ->likes()
 ->whereLikeableId(request()->likeable_id)
 ->whereLikeableType(request()->likeable_type)
 ->whereLike('like')
 ->delete();
}

private function liked()
{
  return Like::whereUserId(auth()->id())
  ->whereLikeableId(request()->likeable_id)
  ->whereLikeableType(request()->likeable_type)
  ->exists();
}

}
