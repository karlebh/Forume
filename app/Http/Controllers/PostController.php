<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }

  public function index()
  {
    return view('post.index')->withPosts(Post::orderBy('sort_at', 'desc')->latest()->withCount('comments')->with('user')->paginate());
  }   

  public function create()
  {
    return view('post.create')
    ->withCategories(\App\Models\Category::all());
  }

  public function store(StorePostRequest $request)
  {
    $slug = trim(Str::limit(Str::slug($request->title), 50, ''), '-');

    $post = $request->user()->posts()->create([
      'title' => $request->title,
      'desc' => $request->desc,
      'category_id' => $request->category_id,
      'slug' => $slug,
    ]);

    (new \App\Http\Helpers\File)->upload($request, $post);

    return redirect()->route('post.show', $post)
    ->withPost($post);
  }

  public function show(Post $post)
  {
    $comments = Comment::with('user')->wherePostId($post->id)->whereNull('parent_id')->latest()->paginate();

    $post->increment('views');

    return view('post.show', $post)
    ->withPost($post)
    ->withComments($comments);
  }

  public function edit(Post $post)
  {
    $this->authorize('update', $post);

    $files = \App\Models\File::whereFileableId($post->id)->whereFileableType($post::class)->get();
    return view('post.edit')->withPost($post)->withFiles($files)->withCategories(\App\Models\Category::all());
  }

  public function update(UpdatePostRequest $request, Post $post)
  {
   $this->authorize('update', $post);

   $slug = trim(Str::limit(Str::slug($request->title), 50, ''), '-');

   $data = $request->except('images');

   //request validate the request array 

   $post->update(array_filter($data));

   (new \App\Http\Helpers\File)->upload($request, $post);

   return redirect()->route('post.show', $post)
   ->withPost($post);


 }

 public function destroy(Post $post)
 {
   $this->authorize('update', $post);

   $post->delete();
 }
}
