<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory, Searchable;

  protected $casts = [
    'category_id' => 'integer',
  ];

  protected $guarded = [];

  public function getRouteKeyName() {
    return 'slug';
  }

  // public function toSearchableArray()
  // {
  //   $array = $this->toArray();

  //   return $array;
  // }

  public function getCategoryAttribute()
  {
    return Category::findOrFail($this->category_id)->name;
  }

  public function comments() {
    return $this->hasMany(Comment::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function files() {
    return $this->morphMany(File::class, 'fileable');
  }

   public function likes() {
    return $this->morphMany(Like::class, 'likeable');
  }

}
