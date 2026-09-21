<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category_id',
        'user_id',
        'published_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function imageUrl()
    {
        return Storage::url($this->image);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function readTime(): int
    {
        $words = str_word_count(strip_tags($this->content));
        return max(1, ceil($words / 200)); // 200 слов в минуту
    }
    public function claps()
    {
        return $this->hasMany(Clap::class);
    }
   
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }
    public function clap(Post $post)
{
    $user = auth()->user();

    $existing = $post->claps()->where('user_id', $user->id)->first();

    if ($existing) {
        $existing->delete();
    } else {
        $post->claps()->create([
            'user_id' => $user->id
        ]);
    }

    return back();
}
    public function clapsCount()
    {
        return $this->claps()->count();
    }
}
